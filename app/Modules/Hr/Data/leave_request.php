<?php

return [
  'model' => 'App\Modules\Hr\Models\LeaveRequest',
  'fieldDefinitions' => [
    'employee_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Employee',
      'validation' => 'required|exists:employees,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'type' => 'belongsTo',
        'display_field' => 'employee_number',
        'dynamic_property' => 'employee',
        'foreign_key' => 'employee_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'column' => 'employee_number',
        'hintField' => 'first_name',
      ],
      'wizard' => [
        'employee_self_service' => true,
      ],
    ],
    'leave_type_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Leave Type',
      'validation' => 'required|exists:leave_types,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\LeaveType',
        'type' => 'belongsTo',
        'display_field' => 'name',
        'dynamic_property' => 'leaveType',
        'foreign_key' => 'leave_type_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\LeaveType',
        'column' => 'name',
        'hintField' => '',
      ],
      'wizard' => [
        'employee_self_service' => true,
      ],
    ],
    'start_date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'Start Date',
      'validation' => 'required|date|after_or_equal:today',
      'wizard' => [
        'employee_self_service' => true,
      ],
    ],
    'end_date' => [
      'display' => 'inline',
      'field_type' => 'datepicker',
      'label' => 'End Date',
      'validation' => 'required|date|after_or_equal:start_date',
      'wizard' => [
        'employee_self_service' => true,
      ],
    ],
    'reason' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Reason',
      'validation' => 'nullable|string|max:1000',
      'wizard' => [
        'employee_self_service' => true,
      ],
    ],
    'status' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Status',
      'validation' => 'required',
      'options' => [
        'Pending' => 'Pending',
        'Approved' => 'Approved',
        'Denied' => 'Denied',
        'Cancelled' => 'Cancelled',
      ],
    ],
    'approved_by' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Approved By',
      'validation' => 'nullable|exists:employees,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'type' => 'belongsTo',
        'display_field' => 'employee_number',
        'dynamic_property' => 'approvedBy',
        'foreign_key' => 'approved_by',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'column' => 'employee_number',
        'hintField' => 'first_name',
      ],
    ],
    'approved_at' => [
      'display' => 'inline',
      'field_type' => 'datetime',
      'label' => 'Approved At',
      'validation' => 'nullable|date',
    ],
    'denial_reason' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Denial Reason',
      'validation' => 'nullable|string|max:1000',
    ],
    'attendance_synced' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Synced to Attendance',
      'validation' => 'boolean',
    ],
    'attendance_records_count' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Attendance Days Created',
      'validation' => 'integer|min:0',
    ],
    'last_sync_at' => [
      'display' => 'inline',
      'field_type' => 'datetime',
      'label' => 'Last Sync Time',
      'validation' => 'nullable|date',
    ],
    'is_retroactive' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Retroactive Request',
      'validation' => 'boolean',
    ],
    'reported_after_absence' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Reported Post-Absence',
      'validation' => 'boolean',
    ],
    'workdays_count' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Working Days',
      'validation' => 'nullable|integer|min:1',
    ],
    'overlap_with_holiday' => [
      'display' => 'inline',
      'field_type' => 'boolcheckbox',
      'label' => 'Overlaps Company Holiday',
      'validation' => 'boolean',
    ],
    'attendanceRecords' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Attendance',
        'type' => 'hasMany',
        'display_field' => 'date',
        'hintField' => '',
        'dynamic_property' => 'attendanceRecords',
        'foreign_key' => 'leave_request_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Attendance',
        'column' => 'date',
        'hintField' => '',
      ],
      'label' => 'Attendancerecords',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'reason',
      '1' => 'denial_reason',
    ],
    'onNewForm' => [
      '0' => 'status',
      '1' => 'approved_by',
      '2' => 'approved_at',
      '3' => 'denial_reason',
    ],
    'onEditForm' => [
      '0' => 'employee_id',
      '1' => 'leave_type_id',
      '2' => 'start_date',
      '3' => 'end_date',
    ],
    'onQuery' => [],
  ],
  'simpleActions' => [
    '0' => 'show',
    '1' => 'edit',
    '2' => 'delete',
  ],
  'isTransaction' => false,
  'dispatchEvents' => true,
  'controls' => [
    'addButton' => [
      '0' => [
        'label' => 'Request Leave',
        'type' => 'wizard',
        'url' => '/hr/leave-request',
        'wizard' => 'employee_self_service',
        'icon' => 'fas fa-plus',
        'primary' => true,
      ],
      '1' => [
        'label' => 'Quick Request',
        'type' => 'quick_add',
        'icon' => 'fas fa-bolt',
      ],
    ],
    'files' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
        '2' => 'pdf',
      ],
      'print' => true,
    ],
    'bulkActions' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
        '2' => 'pdf',
      ],
      'approve' => true,
      'deny' => true,
    ],
    'perPage' => [
      '0' => 5,
      '1' => 10,
      '2' => 25,
      '3' => 50,
      '4' => 100,
    ],
    'search' => true,
    'showHideColumns' => true,
    'filters' => [
      '0' => [
        'field' => 'status',
        'type' => 'select',
        'options' => 'Pending, Approved, Denied, Cancelled',
      ],
      '1' => [
        'field' => 'leave_type_id',
        'type' => 'select',
        'optionsFrom' => 'leave_types',
        'label' => 'Leave Type',
      ],
      '2' => [
        'field' => 'start_date',
        'type' => 'date_range',
        'label' => 'Date Range',
      ],
    ],
  ],
  'fieldGroups' => [
    'request_details' => [
      'title' => 'Request Details',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'employee_id',
        '1' => 'leave_type_id',
        '2' => 'start_date',
        '3' => 'end_date',
        '4' => 'reason',
      ],
    ],
    'approval_info' => [
      'title' => 'Approval Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'status',
        '1' => 'approved_by',
        '2' => 'approved_at',
        '3' => 'denial_reason',
      ],
    ],
    'system_sync_status' => [
      'title' => 'System Sync Status',
      'groupType' => 'leave',
      'fields' => [
        '0' => 'attendance_synced',
        '1' => 'attendance_records_count',
        '2' => 'last_sync_at',
      ],
    ],
    'absenteeism_analytics' => [
      'title' => 'Absence Analytics',
      'groupType' => 'leave',
      'fields' => [
        '0' => 'is_retroactive',
        '1' => 'reported_after_absence',
        '2' => 'workdays_count',
        '3' => 'overlap_with_holiday',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [
    'default' => 'list',
    'card' => [
      'titleFields' => [
        '0' => 'employee.first_name',
        '1' => 'employee.last_name',
      ],
      'subtitleFields' => [
        '0' => 'leaveType.name',
        '1' => 'status',
      ],
      'contentFields' => [
        '0' => 'start_date',
        '1' => 'end_date',
      ],
      'badgeField' => 'status',
      'badgeColors' => [
        'Pending' => 'warning',
        'Approved' => 'success',
        'Denied' => 'danger',
        'Cancelled' => 'secondary',
      ],
    ],
    'list' => [
      'titleFields' => [
        '0' => 'employee.first_name',
        '1' => 'employee.last_name',
      ],
      'subtitleFields' => [
        '0' => 'leaveType.name',
        '1' => 'status',
      ],
      'contentFields' => [
        '0' => 'start_date',
        '1' => 'end_date',
      ],
      'badgeField' => 'status',
      'badgeColors' => [
        'Pending' => 'warning',
        'Approved' => 'success',
        'Denied' => 'danger',
        'Cancelled' => 'secondary',
      ],
    ],
    'detail' => [
      'layout' => 'single',
      'detailType' => 'record',
      'icon' => 'fas fa-calendar-check',
      'titleFields' => [
        '0' => 'employee.first_name',
        '1' => 'employee.last_name',
      ],
      'subtitleFields' => [
        '0' => 'leaveType.name',
      ],
      'contentFields' => [
        '0' => 'start_date',
        '1' => 'end_date',
        '2' => 'reason',
      ],
    ],
  ],
  'relations' => [
    'employee' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'employee_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
      'addToDetail' => true,
    ],
    'leaveType' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\LeaveType',
      'foreignKey' => 'leave_type_id',
      'displayField' => 'name',
    ],
    'approver' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'approved_by',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
    'attendanceRecords' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\Attendance',
      'foreignKey' => 'leave_request_id',
      'displayField' => 'date',
    ],
  ],
  'report' => [],
];
