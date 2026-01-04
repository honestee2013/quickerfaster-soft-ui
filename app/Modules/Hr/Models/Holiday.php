<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\Hr\Models\HolidayCalendar;

use Illuminate\Database\Eloquent\Model;


class Holiday extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'holidays';
    
    
    
    
    

    protected $fillable = [
        'calendar_id', 'name', 'description', 'date', 'observed_date', 'is_recurring', 'recurrence_pattern', 'recurrence_rule', 'holiday_type', 'is_paid_holiday', 'affects_payroll', 'business_impact', 'eligible_employee_types', 'holiday_pay_rate', 'minimum_hours_for_pay', 'country_code', 'region_code', 'is_active', 'is_half_day', 'half_day_end_time'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'date' => 'date',
        'observed_date' => 'date',
        'is_recurring' => 'boolean',
        'is_paid_holiday' => 'boolean',
        'affects_payroll' => 'boolean',
        'holiday_pay_rate' => 'decimal:2',
        'minimum_hours_for_pay' => 'decimal:2',
        'is_active' => 'boolean',
        'is_half_day' => 'boolean',
        'year' => 'integer',
        'generated_from_template' => 'boolean',
        'override_id' => 'integer',
        'last_synced_at' => 'datetime'
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

    public function calendar()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\HolidayCalendar::class, 'calendar_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\HolidayFactory::new();
    }
}