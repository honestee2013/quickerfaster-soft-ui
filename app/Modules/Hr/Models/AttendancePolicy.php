<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


use Illuminate\Database\Eloquent\Model;


class AttendancePolicy extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'attendance_policies';
    
    
    
    
    

    protected $fillable = [
        'name', 'code', 'description', 'grace_period_minutes', 'early_departure_grace_minutes', 'overtime_daily_threshold_hours', 'overtime_weekly_threshold_hours', 'max_daily_overtime_hours', 'overtime_multiplier', 'double_time_threshold_hours', 'double_time_multiplier', 'requires_break_after_hours', 'break_duration_minutes', 'unpaid_break_minutes', 'country_code', 'state_code', 'applies_to_shift_categories', 'effective_date', 'expiration_date', 'is_active', 'is_default'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'grace_period_minutes' => 'integer',
        'early_departure_grace_minutes' => 'integer',
        'overtime_daily_threshold_hours' => 'decimal:2',
        'overtime_weekly_threshold_hours' => 'decimal:2',
        'max_daily_overtime_hours' => 'decimal:2',
        'overtime_multiplier' => 'decimal:2',
        'double_time_threshold_hours' => 'decimal:2',
        'double_time_multiplier' => 'decimal:2',
        'requires_break_after_hours' => 'decimal:2',
        'break_duration_minutes' => 'integer',
        'unpaid_break_minutes' => 'integer',
        'effective_date' => 'date',
        'expiration_date' => 'date',
        'is_active' => 'boolean',
        'is_default' => 'boolean',
        'version' => 'integer',
        'last_updated_at' => 'datetime'
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

    

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\AttendancePolicyFactory::new();
    }
}