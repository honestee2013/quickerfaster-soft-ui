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
        'hintField' => '',
      ],
    ],
    'clock_in_event_id' => [
      'display' => 'inline',
      'field_type' => 'select',
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
        'hintField' => '',
      ],
    ],
    'clock_out_event_id' => [
      'display' => 'inline',
      'field_type' => 'select',
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
        'hintField' => '',
      ],
    ],
    'start_time' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Session Start',
      'validation' => 'required|date',
    ],
    'end_time' => [
      'display' => 'inline',
      'field_type' => 'datetimepicker',
      'label' => 'Session End',
      'validation' => 'required|date|after:start_time',
    ],
    'duration_hours' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Duration (hours)',
      'validation' => 'required|numeric|min:0|max:24',
    ],
    'session_type' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Session Type',
      'validation' => 'nullable|in:work,paid_break,unpaid_break,meeting,overtime',
      'options' => [
        'work' => 'Regular Work',
        'paid_break' => 'Paid Break',
        'unpaid_break' => 'Unpaid Break',
        'meeting' => 'Meeting/Training',
        'overtime' => 'Overtime',
      ],
    ],
    'is_overnight' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Overnight Session',
      'validation' => 'boolean',
    ],
    'is_adjusted' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Manually Adjusted',
      'validation' => 'boolean',
    ],
    'adjustment_reason' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Adjustment Reason',
      'validation' => 'nullable|string|max:500',
    ],
    'adjusted_by' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Adjusted By',
      'validation' => 'nullable|string',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'attendance_id',
      '1' => 'clock_in_event_id',
      '2' => 'clock_out_event_id',
    ],
    'onNewForm' => [],
    'onEditForm' => [
      '0' => 'attendance_id',
      '1' => 'clock_in_event_id',
      '2' => 'clock_out_event_id',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
  ],
  'isTransaction' => false,
  'dispatchEvents' => false,
  'controls' => [
    'perPage' => [
      '0' => 10,
      '1' => 25,
      '2' => 50,
    ],
    'search' => true,
    'showHideColumns' => true,
  ],
  'fieldGroups' => [
    '0' => [
      'title' => 'Session Timing',
      'groupType' => 'time',
      'fields' => [
        '0' => 'start_time',
        '1' => 'end_time',
        '2' => 'duration_hours',
        '3' => 'is_overnight',
      ],
    ],
    '1' => [
      'title' => 'Event Links',
      'groupType' => 'time',
      'fields' => [
        '0' => 'clock_in_event_id',
        '1' => 'clock_out_event_id',
        '2' => 'session_type',
      ],
    ],
    '2' => [
      'title' => 'Adjustments',
      'groupType' => 'time',
      'fields' => [
        '0' => 'is_adjusted',
        '1' => 'adjustment_reason',
        '2' => 'adjusted_by',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'attendance' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Attendance',
      'foreignKey' => 'attendance_id',
      'displayField' => 'date',
    ],
    'clockInEvent' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\ClockEvent',
      'foreignKey' => 'clock_in_event_id',
      'displayField' => 'timestamp',
    ],
    'clockOutEvent' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\ClockEvent',
      'foreignKey' => 'clock_out_event_id',
      'displayField' => 'timestamp',
    ],
  ],
  'report' => [],
];
