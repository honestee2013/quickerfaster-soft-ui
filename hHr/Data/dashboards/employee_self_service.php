<?php

return array (
  'title' => 'My Self-Service',
  'description' => 'Your personal HR dashboard',
  'widgets' => 
  array (
    'quick_actions' => 
    array (
      'type' => 'action-cards',
      'title' => 'Quick Actions',
      'size' => 'col-12',
      'cards' => 
      array (
        0 => 
        array (
          'title' => 'Request Leave',
          'icon' => 'fas fa-calendar-plus',
          'url' => '/hr/leave-request',
          'color' => 'primary',
        ),
        1 => 
        array (
          'title' => 'View My Balance',
          'icon' => 'fas fa-scale-balanced',
          'url' => '/hr/my-leave',
          'color' => 'info',
        ),
        2 => 
        array (
          'title' => 'My Profile',
          'icon' => 'fas fa-user-circle',
          'url' => '/hr/my-profile',
          'color' => 'success',
        ),
        3 => 
        array (
          'title' => 'Documents',
          'icon' => 'fas fa-file',
          'url' => '/hr/my-documents',
          'color' => 'warning',
        ),
      ),
    ),
    'my_leave_summary' => 
    array (
      'type' => 'summary-cards',
      'title' => 'My Leave Summary',
      'size' => 'col-12',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveBalance',
      'cards' => 
      array (
        0 => 
        array (
          'title' => 'Vacation',
          'filters' => 
          array (
            0 => 
            array (
              0 => 'employee_id',
              1 => '=',
              2 => 'currentUserId()',
            ),
            1 => 
            array (
              0 => 'leaveType.code',
              1 => '=',
              2 => 'VAC',
            ),
          ),
          'color' => 'blue',
        ),
        1 => 
        array (
          'title' => 'Sick Leave',
          'filters' => 
          array (
            0 => 
            array (
              0 => 'employee_id',
              1 => '=',
              2 => 'currentUserId()',
            ),
            1 => 
            array (
              0 => 'leaveType.code',
              1 => '=',
              2 => 'SICK',
            ),
          ),
          'color' => 'green',
        ),
        2 => 
        array (
          'title' => 'Personal',
          'filters' => 
          array (
            0 => 
            array (
              0 => 'employee_id',
              1 => '=',
              2 => 'currentUserId()',
            ),
            1 => 
            array (
              0 => 'leaveType.code',
              1 => '=',
              2 => 'PERS',
            ),
          ),
          'color' => 'purple',
        ),
      ),
    ),
    'recent_requests' => 
    array (
      'type' => 'data-table',
      'title' => 'Recent Leave Requests',
      'size' => 'col-12',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'employee_id',
          1 => '=',
          2 => 'currentUserId()',
        ),
      ),
      'limit' => 5,
      'columns' => 
      array (
        0 => 'leaveType.name',
        1 => 'start_date',
        2 => 'end_date',
        3 => 'status',
      ),
      'actions' => 
      array (
        0 => 'view',
      ),
    ),
  ),
  'roles' => 
  array (
    0 => 'employee',
    1 => 'manager',
    2 => 'admin',
  ),
);
