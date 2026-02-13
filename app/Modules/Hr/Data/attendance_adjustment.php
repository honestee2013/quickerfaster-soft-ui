<?php

return [
  'model' => 'App\Modules\Hr\Models\AttendanceAdjustment',
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
        'hintField' => 'employee.first_name,employee.last_name',
      ],
      'fillable' => true,
      'icon' => 'fas fa-calendar-day',
    ],
    'original_net_hours' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Original Hours',
      'validation' => 'nullable|numeric',
      'fillable' => true,
      'modifiers' => [
        'precision' => '6,2',
        'nullable' => true,
      ],
      'computed' => '$attendance->net_hours',
      'icon' => 'fas fa-history',
    ],
    'original_status' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Original Status',
      'validation' => 'nullable|string',
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
      'computed' => '$attendance->status',
      'icon' => 'fas fa-history',
    ],
    'adjusted_net_hours' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'New Hours',
      'validation' => 'required|numeric|min:0|max:24',
      'fillable' => true,
      'modifiers' => [
        'precision' => '6,2',
      ],
      'icon' => 'fas fa-clock',
    ],
    'adjusted_status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'New Status',
      'validation' => 'required',
      'options' => [
        'present' => 'Present',
        'absent' => 'Absent',
        'late' => 'Late Arrival',
        'half_day' => 'Half Day',
        'holiday' => 'Holiday',
        'leave' => 'On Leave',
      ],
      'fillable' => true,
      'icon' => 'fas fa-user-check',
    ],
    'reason' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Reason for Change',
      'validation' => 'required|string|max:500',
      'fillable' => true,
      'placeholder' => 'Why are you making this adjustment?',
      'icon' => 'fas fa-comment-alt',
    ],
    'adjusted_by' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Adjusted By',
      'maxSizeMB' => 1,
      'fillable' => true,
      'modifiers' => [
        'nullable' => true,
      ],
      'computed' => 'auth()->user()->name',
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
      'computed' => 'now()',
      'formatter' => 'QuickerFaster\LaravelUI\Formatting\DateTimeFormatter',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'original_net_hours',
      '1' => 'original_status',
      '2' => 'adjusted_by',
      '3' => 'adjusted_at',
    ],
    'onNewForm' => [
      '0' => 'adjusted_by',
      '1' => 'adjusted_at',
    ],
    'onEditForm' => [
      '0' => 'adjusted_by',
      '1' => 'adjusted_at',
    ],
  ],
  'simpleActions' => [
    '0' => 'show',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => [
    'addButton' => [
      '0' => [
        'label' => 'New Adjustment',
        'type' => 'quick_add',
        'icon' => 'fas fa-plus-circle',
        'primary' => true,
      ],
    ],
    'files' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
      ],
      'print' => false,
    ],
    'perPage' => [
      '0' => 10,
      '1' => 25,
      '2' => 50,
    ],
    'search' => true,
    'showHideColumns' => true,
    'filters' => [
      '0' => [
        'field' => 'attendance_id',
        'type' => 'select',
        'optionsFrom' => 'attendances',
        'label' => 'Attendance Record',
      ],
    ],
  ],
  'fieldGroups' => [
    'adjustment_form' => [
      'title' => 'Adjust Attendance',
      'groupType' => 'hr',
      'icon' => 'fas fa-edit',
      'fields' => [
        '0' => 'attendance_id',
        '1' => 'original_net_hours',
        '2' => 'original_status',
        '3' => 'adjusted_net_hours',
        '4' => 'adjusted_status',
        '5' => 'reason',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [
    'default' => 'list',
    'list' => [
      'titleFields' => [
        '0' => 'attendance.employee.first_name',
        '1' => 'attendance.employee.last_name',
      ],
      'subtitleFields' => [
        '0' => 'attendance.date',
        '1' => 'adjusted_status',
      ],
      'contentFields' => [
        '0' => 'adjusted_net_hours',
        '1' => 'reason',
        '2' => 'adjusted_by',
      ],
      'badgeField' => 'adjusted_status',
    ],
    'detail' => [
      'layout' => 'simple',
      'detailType' => 'record',
      'titleFields' => [
        '0' => 'attendance.employee.first_name',
        '1' => 'attendance.employee.last_name',
      ],
      'subtitleFields' => [
        '0' => 'attendance.date',
      ],
      'fields' => [
        '0' => 'attendance_id',
        '1' => 'original_net_hours',
        '2' => 'original_status',
        '3' => 'adjusted_net_hours',
        '4' => 'adjusted_status',
        '5' => 'reason',
        '6' => 'adjusted_by',
        '7' => 'adjusted_at',
      ],
    ],
  ],
  'relations' => [
    'attendance' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Attendance',
      'foreignKey' => 'attendance_id',
      'displayField' => 'date',
      'hintField' => 'employee.first_name,employee.last_name',
    ],
  ],
  'report' => [],
];
