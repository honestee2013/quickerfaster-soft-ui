<?php

return array (
  'title' => 'Leave Management Dashboard',
  'description' => 'Overview of leave requests, balances, and approvals',
  'widgets' => 
  array (
    'my_leave_balance' => 
    array (
      'type' => 'icon-card',
      'title' => 'My Leave Balance',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveBalance',
      'calculation_method' => 'sum',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'employee_id',
          1 => '=',
          2 => 'currentUserId()',
        ),
      ),
      'icon' => 'fas fa-calendar-check',
      'color' => 'info',
      'column' => 'balance',
      'roles' => 
      array (
        0 => 'employee',
        1 => 'manager',
        2 => 'admin',
      ),
    ),
    'pending_requests' => 
    array (
      'type' => 'icon-card',
      'title' => 'Pending Requests',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
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
          2 => 'Pending',
        ),
      ),
      'icon' => 'fas fa-clock',
      'color' => 'warning',
      'roles' => 
      array (
        0 => 'employee',
        1 => 'manager',
        2 => 'admin',
      ),
    ),
    'upcoming_time_off' => 
    array (
      'type' => 'icon-card',
      'title' => 'Upcoming Time Off',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
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
          2 => 'Approved',
        ),
        2 => 
        array (
          0 => 'start_date',
          1 => '>=',
          2 => 'today',
        ),
      ),
      'icon' => 'fas fa-plane',
      'color' => 'success',
      'roles' => 
      array (
        0 => 'employee',
        1 => 'manager',
        2 => 'admin',
      ),
    ),
    'approvals_pending' => 
    array (
      'type' => 'icon-card',
      'title' => 'Pending Approvals',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'employee.manager_id',
          1 => '=',
          2 => 'currentUserId()',
        ),
        1 => 
        array (
          0 => 'status',
          1 => '=',
          2 => 'Pending',
        ),
      ),
      'icon' => 'fas fa-inbox',
      'color' => 'danger',
      'roles' => 
      array (
        0 => 'manager',
        1 => 'admin',
      ),
    ),
    'team_on_leave_today' => 
    array (
      'type' => 'icon-card',
      'title' => 'Team Out Today',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'employee.manager_id',
          1 => '=',
          2 => 'currentUserId()',
        ),
        1 => 
        array (
          0 => 'status',
          1 => '=',
          2 => 'Approved',
        ),
        2 => 
        array (
          0 => 'start_date',
          1 => '<=',
          2 => 'today',
        ),
        3 => 
        array (
          0 => 'end_date',
          1 => '>=',
          2 => 'today',
        ),
      ),
      'icon' => 'fas fa-user-clock',
      'color' => 'warning',
      'roles' => 
      array (
        0 => 'manager',
        1 => 'admin',
      ),
    ),
    'total_pending_approvals' => 
    array (
      'type' => 'icon-card',
      'title' => 'Total Pending',
      'size' => 'col-sm-4',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
      'calculation_method' => 'count',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => '=',
          2 => 'Pending',
        ),
      ),
      'icon' => 'fas fa-tasks',
      'color' => 'warning',
      'roles' => 
      array (
        0 => 'admin',
      ),
    ),
    'leave_utilization_rate' => 
    array (
      'type' => 'chart',
      'title' => 'Leave Utilization',
      'size' => 'col-6',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveBalance',
      'calculation_method' => 'utilization_rate',
      'chart_type' => 'pie',
      'roles' => 
      array (
        0 => 'admin',
      ),
    ),
    'leave_requests_trend' => 
    array (
      'type' => 'chart',
      'title' => 'Monthly Leave Requests',
      'size' => 'col-6',
      'model' => 'App\\Modules\\Hr\\Models\\LeaveRequest',
      'group_by' => 'monthly',
      'chart_type' => 'line',
      'roles' => 
      array (
        0 => 'admin',
      ),
    ),
  ),
  'roles' => 
  array (
    'admin' => 'full',
    'manager' => 'limited',
    'employee' => 'basic',
  ),
);
