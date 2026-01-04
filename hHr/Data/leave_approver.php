<?php

return [
  'model' => 'App\Modules\Hr\Models\LeaveApprover',
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
    ],
    'approver_id' => [
      'display' => 'inline',
      'field_type' => 'select',
      'label' => 'Approver',
      'validation' => 'required|exists:employees,id',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'type' => 'belongsTo',
        'display_field' => 'employee_number',
        'dynamic_property' => 'approver',
        'foreign_key' => 'approver_id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\Employee',
        'column' => 'employee_number',
        'hintField' => 'first_name',
      ],
    ],
    'approval_level' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Approval Level',
      'validation' => 'required|integer|min:1|max:3',
    ],
    'can_approve_all_types' => [
      'display' => 'inline',
      'field_type' => 'boolradio',
      'label' => 'Can Approve All Types',
      'validation' => 'required',
      'options' => [
        'Yes' => 'Yes',
        'No' => 'No',
      ],
    ],
    'leave_type_ids' => [
      'display' => 'inline',
      'field_type' => 'multiselect',
      'label' => 'Leave Types',
      'validation' => 'required_if:can_approve_all_types,No|array',
    ],
    'max_approval_days' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Max Approval Days',
      'validation' => 'nullable|integer|min:1',
    ],
    'is_active' => [
      'display' => 'inline',
      'field_type' => 'boolradio',
      'label' => 'Is Active',
      'validation' => 'required',
      'options' => [
        'Yes' => 'Yes',
        'No' => 'No',
      ],
    ],
    'leaveTypes' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\LeaveType',
        'type' => 'belongsToMany',
        'display_field' => 'name',
        'hintField' => '',
        'dynamic_property' => 'leaveTypes',
        'foreign_key' => 'leave_approver_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\LeaveType',
        'column' => 'name',
        'hintField' => '',
      ],
      'label' => 'Leavetypes',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [
    'onTable' => [
      '0' => 'approval_level',
      '1' => 'can_approve_all_types',
    ],
    'onNewForm' => [],
    'onEditForm' => [],
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
    'bulkActions' => [
      'export' => [
        '0' => 'xls',
        '1' => 'csv',
      ],
      'delete' => true,
    ],
    'perPage' => [
      '0' => 10,
      '1' => 25,
      '2' => 50,
      '3' => 100,
    ],
    'search' => true,
  ],
  'fieldGroups' => [
    'approval_relationship' => [
      'title' => 'Approval Relationship',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'employee_id',
        '1' => 'approver_id',
        '2' => 'approval_level',
      ],
    ],
    'approval_rules' => [
      'title' => 'Approval Rules',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'can_approve_all_types',
        '1' => 'leave_type_ids',
        '2' => 'max_approval_days',
        '3' => 'is_active',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'employee' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'employee_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
    'approver' => [
      'type' => 'belongsTo',
      'model' => 'App\Modules\Hr\Models\Employee',
      'foreignKey' => 'approver_id',
      'displayField' => 'employee_number',
      'hintField' => 'first_name',
    ],
    'leaveTypes' => [
      'type' => 'belongsToMany',
      'model' => 'App\Modules\Hr\Models\LeaveType',
      'foreignKey' => 'leave_approver_id',
      'relatedKey' => 'leave_type_id',
      'table' => 'leave_approver_leave_type',
      'displayField' => 'name',
    ],
  ],
  'report' => [],
];
