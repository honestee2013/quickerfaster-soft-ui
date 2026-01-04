<?php

return array (
  'title' => 'Absenteeism Analytics',
  'description' => 'Team absence patterns and trends',
  'widgets' => 
  array (
    'absenteeism_rate_current' => 
    array (
      'type' => 'metric-card',
      'title' => 'Current Absenteeism Rate',
      'size' => 'col-12 col-md-4',
      'model' => 'App\\Modules\\Hr\\Models\\Attendance',
      'calculation_method' => 'percentage',
      'icon' => 'fas fa-user-times',
      'color' => 'danger',
      'numerator_filters' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => '=',
          2 => 'absent',
        ),
        1 => 
        array (
          0 => 'date',
          1 => '=',
          2 => 'today()',
        ),
        2 => 
        array (
          0 => 'is_unplanned',
          1 => '=',
          2 => true,
        ),
      ),
      'denominator_filters' => 
      array (
        0 => 
        array (
          0 => 'date',
          1 => '=',
          2 => 'today()',
        ),
      ),
      'format' => 'percentage',
      'trend' => 
      array (
        'period' => 'month',
        'compare' => 'previous_period',
      ),
    ),
    'team_on_leave_today' => 
    array (
      'type' => 'data-table',
      'title' => 'Team on Leave Today',
      'size' => 'col-12 col-md-8',
      'model' => 'App\\Modules\\Hr\\Models\\Attendance',
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
          2 => 'leave',
        ),
        2 => 
        array (
          0 => 'date',
          1 => '=',
          2 => 'today()',
        ),
      ),
      'limit' => 10,
      'columns' => 
      array (
        0 => 'employee.first_name',
        1 => 'employee.last_name',
        2 => 'leaveRequest.leaveType.name',
        3 => 'leaveRequest.reason',
      ),
      'actions' => 
      array (
        0 => 'view_attendance',
      ),
    ),
    'frequent_absentees' => 
    array (
      'type' => 'data-table',
      'title' => 'Frequent Absences (30 Days)',
      'size' => 'col-12 col-lg-6',
      'model' => 'App\\Modules\\Hr\\Models\\Attendance',
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
          1 => 'in',
          2 => 
          array (
            0 => 'absent',
            1 => 'leave',
          ),
        ),
        2 => 
        array (
          0 => 'date',
          1 => '>=',
          2 => '30 days ago',
        ),
        3 => 
        array (
          0 => 'is_unplanned',
          1 => '=',
          2 => true,
        ),
      ),
      'group_by' => 'employee_id',
      'columns' => 
      array (
        0 => 'employee.first_name',
        1 => 'employee.last_name',
        2 => 'absence_count:count',
        3 => 'last_absence:max(date)',
        4 => 'unplanned_count:count(is_unplanned=true)',
      ),
      'order_by' => 'absence_count:desc',
      'limit' => 8,
      'badge_field' => 'absence_count',
      'badge_colors' => 
      array (
        '>5' => 'danger',
        '>3' => 'warning',
        'default' => 'info',
      ),
    ),
    'absence_trend_monthly' => 
    array (
      'type' => 'chart',
      'title' => 'Monthly Absence Trend',
      'size' => 'col-12 col-lg-6',
      'model' => 'App\\Modules\\Hr\\Models\\Attendance',
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
          1 => 'in',
          2 => 
          array (
            0 => 'absent',
            1 => 'leave',
          ),
        ),
        2 => 
        array (
          0 => 'date',
          1 => '>=',
          2 => 'startOfYear()',
        ),
      ),
      'group_by' => 'monthly',
      'chart_type' => 'line',
      'controls' => 
      array (
        0 => 'chart_type',
        1 => 'time_range',
      ),
      'x_field' => 'date',
      'y_fields' => 
      array (
        0 => 
        array (
          'field' => 'status:absent',
          'label' => 'Unplanned Absences',
          'color' => '#ef4444',
        ),
        1 => 
        array (
          'field' => 'status:leave',
          'label' => 'Planned Leave',
          'color' => '#3b82f6',
        ),
      ),
    ),
    'absence_by_department' => 
    array (
      'type' => 'chart',
      'title' => 'Absence by Department',
      'size' => 'col-12',
      'model' => 'App\\Modules\\Hr\\Models\\Attendance',
      'filters' => 
      array (
        0 => 
        array (
          0 => 'date',
          1 => '>=',
          2 => 'startOfMonth()',
        ),
        1 => 
        array (
          0 => 'status',
          1 => 'in',
          2 => 
          array (
            0 => 'absent',
            1 => 'leave',
          ),
        ),
      ),
      'pivot' => 
      array (
        'table' => 'attendances',
        'model_column' => 'employee_id',
      ),
      'group_by_table' => 'employees',
      'group_by_table_column' => 'department_id',
      'chart_type' => 'bar',
      'x_label' => 'Department',
      'y_label' => 'Absence Days',
      'colors' => 
      array (
        0 => '#3b82f6',
        1 => '#ef4444',
        2 => '#10b981',
        3 => '#f59e0b',
      ),
      'roles' => 
      array (
        0 => 'admin',
      ),
    ),
    'pending_absence_reviews' => 
    array (
      'type' => 'status-cards',
      'title' => 'Action Required',
      'size' => 'col-12',
      'cards' => 
      array (
        0 => 
        array (
          'title' => 'Unplanned Absences to Review',
          'model' => 'App\\Modules\\Hr\\Models\\Attendance',
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
              0 => 'needs_review',
              1 => '=',
              2 => true,
            ),
          ),
          'icon' => 'fas fa-exclamation-triangle',
          'color' => 'danger',
          'action' => 
          array (
            'label' => 'Review Now',
            'url' => '/hr/attendance?filter=needs_review',
          ),
        ),
        1 => 
        array (
          'title' => 'Late Requests This Week',
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
              0 => 'is_retroactive',
              1 => '=',
              2 => true,
            ),
            2 => 
            array (
              0 => 'created_at',
              1 => '>=',
              2 => 'startOfWeek()',
            ),
          ),
          'icon' => 'fas fa-clock',
          'color' => 'warning',
          'action' => 
          array (
            'label' => 'View Requests',
            'url' => '/hr/leave-requests?filter=retroactive',
          ),
        ),
      ),
    ),
  ),
  'roles' => 
  array (
    'manager' => 'full',
    'admin' => 'full',
    'employee' => 'none',
  ),
);
