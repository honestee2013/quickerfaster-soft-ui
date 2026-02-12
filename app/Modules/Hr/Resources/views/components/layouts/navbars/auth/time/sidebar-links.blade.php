{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.time/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/shifts" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Shifts">
<i class="fas fa-calendar-day me-2"></i>
@if ($state === 'full')
<span>Shifts</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/attendances" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Attendance">
<i class="fas fa-user-clock me-2"></i>
@if ($state === 'full')
<span>Attendance</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/attendance-adjustments" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Adjust Attendance">
<i class="fas fa-user-edit me-2"></i>
@if ($state === 'full')
<span>Adjust Attendance</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/shift-schedules" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Shift Schedules">
<i class="fas fa-calendar-alt me-2"></i>
@if ($state === 'full')
<span>Shift Schedules</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/clock-events" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Clock Events">
<i class="fas fa-clock me-2"></i>
@if ($state === 'full')
<span>Clock Events</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/attendance-sessions" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Work Sessions">
<i class="fas fa-history me-2"></i>
@if ($state === 'full')
<span>Work Sessions</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/holiday-calendars" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Holiday Calendars">
<i class="fas fa-calendar-alt me-2"></i>
@if ($state === 'full')
<span>Holiday Calendars</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/holidays" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Holidays">
        <i class="fas fa-gift me-2"></i>
        @if ($state === 'full')
            <span>Holidays</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.time/sidebar-post-links')
