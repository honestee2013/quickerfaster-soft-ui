<?php

return [
  'model' => 'App\Modules\Hr\Models\LeaveType',
  'fieldDefinitions' => [
    'name' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Leave Type Name',
      'validation' => 'required|string|max:255',
    ],
    'code' => [
      'display' => 'inline',
      'field_type' => 'string',
      'label' => 'Short Code',
      'validation' => 'required|string|max:10|unique:leave_types,code',
    ],
    'deducts_from_balance' => [
      'display' => 'inline',
      'field_type' => 'boolradio',
      'label' => 'Deducts From Balance',
      'validation' => 'required',
      'options' => [
        'Yes' => 'Yes',
        'No' => 'No',
      ],
    ],
    'requires_approval' => [
      'display' => 'inline',
      'field_type' => 'boolradio',
      'label' => 'Requires Approval',
      'validation' => 'required',
      'options' => [
        'Yes' => 'Yes',
        'No' => 'No',
      ],
    ],
    'max_days_per_request' => [
      'display' => 'inline',
      'field_type' => 'number',
      'label' => 'Max Days Per Request',
      'validation' => 'nullable|integer|min:1',
    ],
    'is_active' => [
      'display' => 'inline',
      'field_type' => 'boolradio',
      'label' => 'Is Active',
      'validation' => 'required',
      'options' => [
        'Active' => 'Active',
        'Inactive' => 'Inactive',
      ],
    ],
    'description' => [
      'display' => 'inline',
      'field_type' => 'textarea',
      'label' => 'Description',
      'maxSizeMB' => 1,
    ],
    'leaveBalances' => [
      'field_type' => 'checkbox',
      'relationship' => [
        'model' => 'App\Modules\Hr\Models\LeaveBalance',
        'type' => 'hasMany',
        'display_field' => 'balance',
        'hintField' => '',
        'dynamic_property' => 'leaveBalances',
        'foreign_key' => 'leave_type_id',
        'local_key' => 'id',
        'inlineAdd' => false,
      ],
      'options' => [
        'model' => 'App\Modules\Hr\Models\LeaveBalance',
        'column' => 'balance',
        'hintField' => '',
      ],
      'label' => 'Leavebalances',
      'multiSelect' => true,
      'display' => 'inline',
    ],
  ],
  'hiddenFields' => [],
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
        'label' => 'Add Leave Type',
        'type' => 'quick_add',
        'icon' => 'fas fa-plus',
        'primary' => true,
      ],
    ],
  ],
  'fieldGroups' => [
    'basic_info' => [
      'title' => 'Basic Information',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'name',
        '1' => 'code',
        '2' => 'color',
        '3' => 'description',
      ],
    ],
    'rules' => [
      'title' => 'Leave Rules',
      'groupType' => 'hr',
      'fields' => [
        '0' => 'deducts_from_balance',
        '1' => 'requires_approval',
        '2' => 'max_days_per_request',
        '3' => 'is_active',
      ],
    ],
  ],
  'moreActions' => [],
  'switchViews' => [],
  'relations' => [
    'leaveBalances' => [
      'type' => 'hasMany',
      'model' => 'App\Modules\Hr\Models\LeaveBalance',
      'foreignKey' => 'leave_type_id',
      'displayField' => 'balance',
    ],
  ],
  'report' => [],
];
