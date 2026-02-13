<?php

return [
  'model' => 'App\Modules\Hr\Models\AttendanceSession',
  'fieldDefinitions' => [
    'attendance_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Attendance Record',
      'validation' => 'required|exists:attendances,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Attendance',
        'type' => 'belongsTo',
        'display_field' => 'date',
        'dynamic_property' => 'attendance',
        'foreign_key' => 'attendance_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Attendance',
        'column' => 'date',
        'hintField' => 'employee_id',
      ],
      'fillable' => true,
      'icon' => 'fas fa-calendar-day',
    ],
    'clock_in_event_id' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Clock-In Event',
      'validation' => 'nullable|exists:clock_events,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\ClockEvent',
        'type' => 'belongsTo',
        'display_field' => 'timestamp',
        'dynamic_property' => 'clockInEvent',
        'foreign_key' => 'clock_in_event_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\ClockEvent',
        'column' => 'timestamp',
        'hintField' => 'method',
      ],
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
    ],
    'clock_out_event_id' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Clock-Out Event',
      'validation' => 'nullable|exists:clock_events,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\ClockEvent',
        'type' => 'belongsTo',
        'display_field' => 'timestamp',
        'dynamic_property' => 'clockOutEvent',
        'foreign_key' => 'clock_out_event_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\ClockEvent',
        'column' => 'timestamp',
        'hintField' => 'method',
      ],
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
    ],
    'start_time' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Session Start',
      'validation' => 'required|date',
      'fillable' => true,
      'icon' => 'fas fa-play-circle',
      'formatter' => 'QuickerFaster\LaravelUI\Formatting\DateTimeFormatter',
    ],
    'end_time' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Session End',
      'validation' => 'required|date|after:start_time',
      'fillable' => true,
      'icon' => 'fas fa-stop-circle',
      'modifiers' => [
        'nullable' => true,
      ],
      'formatter' => 'QuickerFaster\LaravelUI\Formatting\DateTimeFormatter',
    ],
    'duration_hours' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Duration (hours)',
      'validation' => 'required|numeric|min:0|max:24',
      'fillable' => true,
      'modifiers' => [
        'precision' => '6,2',
        'default' => 0,
      ],
      'icon' => 'fas fa-hourglass-half',
    ],
    'session_type' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Session Type',
      'validation' => 'required',
      'options' => [
        'work' => 'Regular Work',
        'paid_break' => 'Paid Break',
        'unpaid_break' => 'Unpaid Break',
        'meeting' => 'Meeting/Training',
        'overtime' => 'Overtime',
        'on_call' => 'On-Call',
        'travel' => 'Travel Time',
      ],
      'fillable' => true,
      'modifiers' => [
        'default' => 'work',
        'nullable' => true,
      ],
      'icon' => 'fas fa-tag',
    ],
    'is_overnight' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Overnight Session',
      'validation' => 'boolean',
      'fillable' => true,
      'modifiers' => [
        'default' => false,
      ],
    ],
    'is_adjusted' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Manually Adjusted',
      'validation' => 'boolean',
      'fillable' => true,
      'modifiers' => [
        'default' => false,
      ],
      'icon' => 'fas fa-edit',
    ],
    'adjustment_reason' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Adjustment Reason',
      'validation' => 'required|string|max:500',
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
      'placeholder' => 'Explain why this session was adjusted',
    ],
    'adjusted_by' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Adjusted By',
      'validation' => 'nullable|string',
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
    ],
    'adjusted_at' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Adjusted At',
      'maxSizeMB' => 1,
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
      'formatter' => 'QuickerFaster\LaravelUI\Formatting\DateTimeFormatter',
    ],
    'calculated_duration' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Calculated Duration',
      'maxSizeMB' => 1,
      'fillable' => true,
      'modifiers' => [
        'precision' => '6,2',
        'nullable' => true,
      ],
    ],
    'validation_status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Validation Status',
      'maxSizeMB' => 1,
      'options' => [
        'valid' => 'Valid',
        'missing_clock_out' => 'Missing Clock-Out',
        'overlaps' => 'Overlaps Another Session',
        'too_short' => 'Session Too Short',
        'too_long' => 'Session Too Long',
      ],
      'fillable' => true,
      'modifiers' => [
        'default' => 'valid',
        'nullable' => true,
      ],
    ],
    'validation_notes' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Validation Notes',
      'maxSizeMB' => 1,
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'attendance_id',
      '1' => 'clock_in_event_id',
      '2' => 'clock_out_event_id',
      '3' => 'is_overnight',
      '4' => 'adjusted_by',
      '5' => 'adjusted_at',
      '6' => 'calculated_duration',
      '7' => 'validation_status',
      '8' => 'validation_notes',
    ],
    'onNewForm' => [
      '0' => 'clock_in_event_id',
      '1' => 'clock_out_event_id',
      '2' => 'is_overnight',
      '3' => 'duration_hours',
      '4' => 'adjusted_by',
      '5' => 'adjusted_at',
      '6' => 'calculated_duration',
      '7' => 'validation_status',
      '8' => 'validation_notes',
    ],
    'onEditForm' => [
      '0' => 'clock_in_event_id',
      '1' => 'clock_out_event_id',
      '2' => 'is_overnight',
      '3' => 'adjusted_by',
      '4' => 'adjusted_at',
      '5' => 'calculated_duration',
      '6' => 'validation_status',
      '7' => 'validation_notes',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
    '1' => 'edit',
    '2' => 'delete',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => [
    'addButton' => [
      '0' => [
        'label' => 'Add Work Session',
        'type' => 'quick_add',
        'icon' => 'fas fa-plus-circle',
        'primary' => false,
      ],
    ],
    'files' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
      ],
      'print' => false,
    ],
    'bulkActions' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
      ],
      'updateModelFields' => [
        'is_adjusted' => [
          'label' => 'Mark as Adjusted',
          'value' => true,
        ],
        'is_adjusted_false' => [
          'label' => 'Mark as Not Adjusted',
          'value' => false,
        ],
      ],
    ],
    'perPage' => [
      '0' => 10,
      '1' => 25,
      '2' => 50,
      '3' => 100,
    ],
    'search' => true,
    'showHideColumns' => true,
    'filterColumns' => true,
  ],
  'fieldGroups' => [
    'session_timing' => [
      'title' => 'Session Timing',
      'groupType' => 'hr',
      'icon' => 'fas fa-clock',
      'fields' => [
        '0' => 'start_time',
        '1' => 'end_time',
        '2' => 'duration_hours',
        '3' => 'is_overnight',
      ],
    ],
    'session_details' => [
      'title' => 'Session Details',
      'groupType' => 'hr',
      'icon' => 'fas fa-info-circle',
      'fields' => [
        '0' => 'session_type',
        '1' => 'attendance_id',
      ],
    ],
    'event_links' => [
      'title' => 'Event Links',
      'groupType' => 'hr',
      'icon' => 'fas fa-link',
      'fields' => [
        '0' => 'clock_in_event_id',
        '1' => 'clock_out_event_id',
      ],
    ],
    'adjustments' => [
      'title' => 'Adjustments',
      'groupType' => 'hr',
      'icon' => 'fas fa-edit',
      'fields' => [
        '0' => 'is_adjusted',
        '1' => 'adjustment_reason',
        '2' => 'adjusted_by',
        '3' => 'adjusted_at',
      ],
    ],
    'system_info' => [
      'title' => 'System Information',
      'groupType' => 'hr',
      'icon' => 'fas fa-server',
      'fields' => [
        '0' => 'calculated_duration',
        '1' => 'validation_status',
        '2' => 'validation_notes',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [
    'default' => 'list',
    'card' => [
      'titleFields' => [
        '0' => 'start_time',
      ],
      'subtitleFields' => [
        '0' => 'end_time',
        '1' => 'duration_hours',
      ],
      'contentFields' => [
        '0' => 'session_type',
      ],
      'badgeField' => 'is_adjusted',
      'badgeColors' => [
        'true' => 'warning',
        'false' => 'secondary',
      ],
    ],
    'list' => [
      'titleFields' => [
        '0' => 'start_time',
      ],
      'subtitleFields' => [
        '0' => 'end_time',
        '1' => 'duration_hours',
      ],
      'contentFields' => [
        '0' => 'session_type',
        '1' => 'attendance.employee.first_name',
      ],
      'badgeField' => 'is_adjusted',
      'badgeColors' => [
        'true' => 'warning',
        'false' => 'secondary',
      ],
    ],
    'detail' => [
      'layout' => 'tab',
      'detailType' => 'record',
      'titleFields' => [
        '0' => 'start_time',
      ],
      'subtitleFields' => [
        '0' => 'end_time',
        '1' => 'duration_hours',
      ],
      'tabs' => [
        '0' => [
          'title' => 'Session Details',
          'icon' => 'fas fa-info-circle',
          'fields' => [
            '0' => 'start_time',
            '1' => 'end_time',
            '2' => 'duration_hours',
            '3' => 'session_type',
            '4' => 'is_adjusted',
            '5' => 'adjustment_reason',
          ],
        ],
        '1' => [
          'title' => 'Related Records',
          'icon' => 'fas fa-link',
          'fields' => [
            '0' => 'attendance_id',
            '1' => 'clock_in_event_id',
            '2' => 'clock_out_event_id',
          ],
        ],
        '2' => [
          'title' => 'Validation',
          'icon' => 'fas fa-check-circle',
          'fields' => [
            '0' => 'validation_status',
            '1' => 'validation_notes',
            '2' => 'calculated_duration',
          ],
        ],
      ],
    ],
  ],
  'relations' => [
    'attendance' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Attendance',
      'foreignKey' => 'attendance_id',
      'displayField' => 'date',
      'hintField' => 'employee_id',
    ],
    'clockInEvent' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\ClockEvent',
      'foreignKey' => 'clock_in_event_id',
      'displayField' => 'timestamp',
      'hintField' => 'method',
    ],
    'clockOutEvent' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\ClockEvent',
      'foreignKey' => 'clock_out_event_id',
      'displayField' => 'timestamp',
      'hintField' => 'method',
    ],
  ],
  'report' => [],
];
