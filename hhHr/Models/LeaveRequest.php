<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\Hr\Models\Employee;
use App\Modules\Hr\Models\LeaveType;

use Illuminate\Database\Eloquent\Model;


class LeaveRequest extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'leave_requests';
    
    
    
    
    

    protected $fillable = [
        'employee_id', 'leave_type_id', 'start_date', 'end_date', 'reason', 'status', 'approved_by', 'approved_at', 'denial_reason'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'approved_at' => 'datetime'
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

    public function leaveType()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\LeaveType::class, 'leave_type_id', 'id');
    }

    public function approver()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\Employee::class, 'approved_by', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\LeaveRequestFactory::new();
    }
}