<?php

namespace App\Modules\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Modules\Hr\Models\ShiftSchedule;
use App\Modules\Hr\Models\Attendance;
use App\Modules\Hr\Models\Department;
use App\Modules\Hr\Models\Shift;

use Illuminate\Database\Eloquent\Model;


class Shift extends Model 
{
    use HasFactory;
    
    

    

    protected $table = 'shifts';
    
    
    
    
    

    protected $fillable = [
        'name', 'code', 'start_time', 'end_time', 'duration_hours', 'break_duration', 'is_overnight', 'description', 'is_active', 'is_default', 'overtime_starts_after', 'grace_period_minutes', 'max_shift_hours', 'shift_category', 'pay_multiplier', 'minimum_staffing', 'is_restricted', 'created_from_template_id', 'last_used_date', 'usage_count'
    ];

    protected $guarded = [
        
    ];

    protected $casts = [
        'duration_hours' => 'decimal:2',
        'break_duration' => 'decimal:2',
        'is_overnight' => 'boolean',
        'is_active' => 'boolean',
        'is_default' => 'boolean',
        'overtime_starts_after' => 'decimal:2',
        'grace_period_minutes' => 'integer',
        'max_shift_hours' => 'decimal:2',
        'pay_multiplier' => 'decimal:2',
        'minimum_staffing' => 'integer',
        'is_restricted' => 'boolean',
        'created_from_template_id' => 'integer',
        'last_used_date' => 'date',
        'usage_count' => 'integer'
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

    public function shiftSchedules()
    {
        return $this->hasMany(\App\Modules\Hr\Models\ShiftSchedule::class, 'shift_id', 'id');
    }

    public function attendanceRecords()
    {
        return $this->hasMany(\App\Modules\Hr\Models\Attendance::class, 'shift_id', 'id');
    }

    public function departments()
    {
        return $this->belongsToMany(\App\Modules\Hr\Models\Department::class, 'model_generator_id', 'department_id', 'id', 'department_id');
    }

    public function templateSource()
    {
        return $this->belongsTo(\App\Modules\Hr\Models\Shift::class, 'created_from_template_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return \App\Modules\Hr\Database\Factories\ShiftFactory::new();
    }
}