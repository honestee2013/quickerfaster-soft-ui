<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\Hr\Models\Employee;
use App\Modules\Hr\Models\AttendanceSession;
use App\Modules\Hr\Models\AttendanceAdjustment;
use App\Modules\Hr\Models\LeaveRequest;
use App\Modules\Hr\Models\Shift;

use Illuminate\Database\Eloquent\Model;


class Attendance extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'attendances';
    
    
    
    
    

    protected $fillable = [
        'employee_id', 'employee_number', 'company', 'department', 'date', 'net_hours', 'status', 'sessions', 'shift_id', 'absence_type', 'is_unplanned', 'absence_reason', 'is_paid_absence', 'hours_deducted', 'is_approved', 'approved_by', 'approved_at', 'notes', 'needs_review', 'leave_request_id', 'last_calculated_at', 'calculation_method'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'date' => 'date',
        'net_hours' => 'decimal:2',
        'sessions' => 'json',
        'is_unplanned' => 'boolean',
        'is_paid_absence' => 'boolean',
        'hours_deducted' => 'decimal:2',
        'is_approved' => 'boolean',
        'approved_at' => 'datetime',
        'needs_review' => 'boolean',
        'last_calculated_at' => 'datetime'
    ];

    protected $dispatchesEvents = [
        
    ];

    /**
     * Validation rules for the model.
     */
    protected static $rules = [
        
    ];

    /**
     * Custom validation messages.
     */
    protected static $messages = [
        
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        
    }

    /**
     * Validate the model instance.
     */
    public function validate()
    {
        $validator = Validator::make($this->attributesToArray(), static::$rules, static::$messages);
        
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        
        return true;
    }

    /**
     * Save the model to the database with validation.
     */
    public function save(array $options = [])
    {
        $this->validate();
        return parent::save($options);
    }

    public function employee()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\Employee::class, 'employee_id', 'id');
    }

    public function attendanceSessions()
    {
        return $this->hasMany(\App\Modules\Hr\Models\AttendanceSession::class, 'attendance_id', 'id');
    }

    public function adjustments()
    {
        return $this->hasMany(\App\Modules\Hr\Models\AttendanceAdjustment::class, 'attendance_id', 'id');
    }

    public function leaveRequest()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\LeaveRequest::class, 'leave_request_id', 'id');
    }

    public function shift()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\Shift::class, 'shift_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\AttendanceFactory::new();
    }
}