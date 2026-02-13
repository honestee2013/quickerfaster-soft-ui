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
    'my_absence_history' => 
    array (
      'type' => 'data-table',
      'title' => 'My Recent Absences',
      'size' => 'col-12',
      'model' => 'App\\Modules\\Hr\\Models\\Attendance',
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
          0 => 'status',
          1 => 'in',
          2 => 
          array (
            0 => 'leave',
            1 => 'absent',
          ),
        ),
        2 => 
        array (
          0 => 'date',
          1 => '>=',
          2 => '30 days ago',
        ),
      ),
      'limit' => 8,
      'columns' => 
      array (
        0 => 'date:format(Y-m-d)',
        1 => 'status:badge',
        2 => 'absence_type',
        3 => 'net_hours',
        4 => 'is_approved:badge',
      ),
      'badge_field' => 'status',
      'badge_colors' => 
      array (
        'leave' => 'success',
        'absent' => 'warning',
        'incomplete' => 'info',
      ),
    ),
    'quick_absence_report' => 
    array (
      'type' => 'action-card',
      'title' => 'Report Sudden Absence',
      'size' => 'col-12 col-md-6',
      'icon' => 'fas fa-bell',
      'color' => 'warning',
      'description' => 'Sick or emergency? Notify your manager quickly',
      'action' => 
      array (
        'label' => 'Report Now',
        'wizard' => 'sick_call_report',
        'url' => '/hr/report-absence',
        'confirm' => true,
        'confirm_message' => 'This will notify your manager immediately. Submit a formal leave request later.',
      ),
    ),
    'leave_balance_summary' => 
    array (
      'type' => 'summary-cards',
      'title' => 'My Leave Balances',
      'size' => 'col-12 col-md-6',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveBalance',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'employee_id',
          1 => '=',
          2 => 'currentUserId()',
        ),
      ),
      'cards' => 
      array (
        0 => 
        array (
          'title' => 'Vacation',
          'filters' => 
          array (
            0 => 
            array (
              0 => 'leaveType.code',
              1 => '=',
              2 => 'VAC',
            ),
          ),
          'color' => 'blue',
          'show_used' => true,
        ),
        1 => 
        array (
          'title' => 'Sick Leave',
          'filters' => 
          array (
            0 => 
            array (
              0 => 'leaveType.code',
              1 => '=',
              2 => 'SICK',
            ),
          ),
          'color' => 'green',
          'show_used' => true,
        ),
        2 => 
        array (
          'title' => 'Personal',
          'filters' => 
          array (
            0 => 
            array (
              0 => 'leaveType.code',
              1 => '=',
              2 => 'PERS',
            ),
          ),
          'color' => 'purple',
        ),
        3 => 
        array (
          'title' => 'Unplanned (30d)',
          'model' => 'App\\Modules\\Hr\\Models\\Attendance',
          'calculation_method' => 'count',
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
              0 => 'status',
              1 => '=',
              2 => 'absent',
            ),
            2 => 
            array (
              0 => 'is_unplanned',
              1 => '=',
              2 => true,
            ),
            3 => 
            array (
              0 => 'date',
              1 => '>=',
              2 => '30 days ago',
            ),
          ),
          'color' => 'orange',
          'action' => 
          array (
            'label' => 'View Details',
            'url' => '/hr/my-attendance',
          ),
        ),
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
