<?php

namespace App\Modules\Hr\Services;

use App\Modules\Hr\Models\ClockEvent;
use App\Modules\Hr\Models\Attendance;
use Carbon\Carbon;

use App\Modules\Hr\Http\Controllers\ClockEventController;
use App\Modules\Hr\Models\AttendanceSession;    

use Illuminate\Support\Facades\DB;




class AttendanceAggregator
{
    public function recalculateForDay(string $employeeId, string $date): void
    {
        DB::transaction(function () use ($employeeId, $date) {

            \Log::debug('AttendanceAggregator called', [
                'employeeId' => $employeeId,
                'date' => $date,
                'normalizedDate' => Carbon::parse($date)->format("Y-m-d H:i:s")
            ]);



            // 🔑 1. Normalize date ONCE
            $normalizedDate = Carbon::parse($date)->format("Y-m-d H:i:s");

            // 🔑 2. Explicitly find existing record
            $attendance = Attendance::where('employee_id', $employeeId)
                ->where('date', $normalizedDate)
                ->first();

            if (!$attendance) {
                // Create attendance record first
                $attendance = Attendance::create([
                    'employee_id' => $employeeId,
                    'date' => $normalizedDate,
                    'status' => 'incomplete',
                    'is_approved' => false,
                    'net_hours' => 0.00,
                ]);
            } else {
                // 🔄 Clear existing AttendanceSession records for this day
                // This ensures clean recalculations
                AttendanceSession::where('attendance_id', $attendance->id)->delete();
            }

            // 🔑 3. Calculate sessions
            $events = ClockEvent::where('employee_id', $employeeId)
                ->whereDate('timestamp', $normalizedDate)
                ->orderBy('timestamp')
                ->orderBy('id')
                ->get();


            \Log::debug('Events found', [
                'count' => $events->count(),
                'events' => $events->map(fn($e) => [
                    'id' => $e->id,
                    'type' => $e->event_type,
                    'timestamp' => $e->timestamp,
                    'employee_id' => $e->employee_id
                ])
            ]);



            $sessions = [];          // For JSON backward compatibility
            $totalHours = 0.0;
            $currentState = 'out';
            $currentSessionStart = null;
            $sessionStartEvent = null; // ← NEW: Track the clock-in event
            $notes = [];

            foreach ($events as $event) {
                if ($event->event_type === 'clock_in') {
                    if ($currentState === 'out') {
                        $currentState = 'in';
                        $currentSessionStart = $event->timestamp;
                        $sessionStartEvent = $event; // ← NEW: Save the clock-in event
                    } else {
                        $notes[] = "Ignored duplicate clock-in at {$event->timestamp->format('H:i')}";
                    }
                } elseif ($event->event_type === 'clock_out') {
                    if ($currentState === 'in' && $currentSessionStart && $sessionStartEvent) {
                        if ($event->timestamp->greaterThan($currentSessionStart)) {
                            $duration = $currentSessionStart->diffInMinutes($event->timestamp) / 60.0;
                            $duration = round($duration, 2);
                            $totalHours += $duration;

                            // ✅ 1. Store in JSON (existing behavior - BACKWARD COMPATIBLE)
                            $sessions[] = [
                                'start' => $currentSessionStart->format('H:i'),
                                'end' => $event->timestamp->format('H:i'),
                                'duration' => $duration
                            ];

                            // ✅ 2. Store in AttendanceSession (NEW RELATIONAL MODEL)
                            // ================================================
                            // CRITICAL: This creates the relational session record
                            // ================================================
                            AttendanceSession::create([
                                'attendance_id' => $attendance->id,
                                'clock_in_event_id' => $sessionStartEvent->id,
                                'clock_out_event_id' => $event->id,
                                'start_time' => $currentSessionStart,
                                'end_time' => $event->timestamp,
                                'duration_hours' => $duration,
                                'session_type' => 'work', // Default, can be adjusted later
                                'is_overnight' => $currentSessionStart->format('Y-m-d') !== $event->timestamp->format('Y-m-d'),
                            ]);
                            // ================================================

                            $currentState = 'out';
                            $currentSessionStart = null;
                            $sessionStartEvent = null;
                        } else {
                            $notes[] = "Ignored invalid clock-out (before clock-in) at {$event->timestamp->format('H:i')}";
                        }
                    } else {
                        $notes[] = "Ignored clock-out without prior clock-in at {$event->timestamp->format('H:i')}";
                    }
                }
            }

            // Handle orphaned clock-in (no matching clock-out)
            if ($currentState === 'in' && $currentSessionStart && $sessionStartEvent) {
                $notes[] = "Open session started at {$currentSessionStart->format('H:i')} - no clock-out yet";

                // Optional: Still create a partial AttendanceSession for tracking
                // AttendanceSession::create([
                //     'attendance_id' => $attendance->id,
                //     'clock_in_event_id' => $sessionStartEvent->id,
                //     'clock_out_event_id' => null,
                //     'start_time' => $currentSessionStart,
                //     'end_time' => null,
                //     'duration_hours' => 0.00,
                //     'session_type' => 'work',
                //     'is_overnight' => false,
                // ]);
            }

            // Final status
            $status = match (true) {
                $currentState === 'in' => 'incomplete',
                count($sessions) > 0 => 'complete',
                default => 'incomplete'
            };

            // Add note if there were invalid events
            $finalNote = !empty($notes) ? implode('; ', $notes) : null;

            // 🔑 4. Update the attendance record
            $attendance->update([
                'net_hours' => round($totalHours, 2),
                'sessions' => !empty($sessions) ? json_encode($sessions) : null, // ← KEEP JSON for backward compatibility
                'status' => $status,
                'is_approved' => $attendance->is_approved, // Preserve approval status
                'notes' => $finalNote,
                'needs_review' => !empty($notes),
            ]);
        });
    }



}
