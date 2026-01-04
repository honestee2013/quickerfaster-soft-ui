<?php

return array (
  'title' => 'Leave Balance Test',
  'description' => '',
  'widgets' => 
  array (
    'vacation_balance' => 
    array (
      'type' => 'balance-card',
      'title' => 'Vacation Balance',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'icon' => 'fas fa-umbrella-beach',
      'color' => 'info',
      'current' => 4,
      'total' => 8,
      'unit' => 'days',
      'action' => 
      array (
        'label' => 'View Details',
        'url' => '/hr/leave/vacation',
        'icon' => 'fas fa-arrow-right',
      ),
    ),
    'sick_balance' => 
    array (
      'type' => 'balance-card',
      'title' => 'Sick Leave',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'icon' => 'fas fa-heartbeat',
      'color' => 'success',
      'current' => 10,
      'total' => 10,
      'unit' => 'days',
    ),
    'training_days' => 
    array (
      'type' => 'balance-card',
      'title' => 'Training Days',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'icon' => 'fas fa-graduation-cap',
      'color' => 'primary',
      'current' => 2,
      'total' => 5,
      'unit' => 'days',
    ),
    'personal_days' => 
    array (
      'type' => 'balance-card',
      'title' => 'Personal Days',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'icon' => 'fas fa-user-clock',
      'color' => 'warning',
      'current' => 0,
      'total' => 3,
      'unit' => 'days',
      'action' => 
      array (
        'label' => 'Request More',
        'event' => 'openPersonalLeaveModal',
        'icon' => 'fas fa-plus',
      ),
    ),
    'pending_leave_approvals' => 
    array (
      'type' => 'status-card',
      'title' => 'Pending Approvals',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'icon' => 'fas fa-inbox',
      'color' => 'warning',
      'count' => 3,
      'status_text' => 'Awaiting your review',
      'action' => 
      array (
        'type' => 'button',
        'label' => 'Review Now',
        'url' => '/hr/leave/pending',
        'icon' => 'fas fa-eye',
      ),
    ),
    'upcoming_time_off' => 
    array (
      'type' => 'status-card',
      'title' => 'Upcoming Time Off',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'icon' => 'fas fa-plane',
      'color' => 'primary',
      'count' => 1,
      'unit' => 'leave requests',
      'action' => 
      array (
        'label' => 'View Calendar',
        'event' => 'openLeaveCalendar',
        'icon' => 'fas fa-calendar',
      ),
    ),
    'team_availability' => 
    array (
      'type' => 'status-card',
      'title' => 'Team Out Today',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'icon' => 'fas fa-users',
      'color' => 'info',
      'count' => 2,
      'status' => 'team members absent',
      'show_badge' => true,
      'action' => 
      array (
        'type' => 'button',
        'label' => 'View Team',
        'url' => '/hr/team/availability',
        'icon' => 'fas fa-user-friends',
      ),
    ),
    'expired_documents' => 
    array (
      'type' => 'status-card',
      'title' => 'Expired Documents',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'model' => 'App\\Modules\\Hr\\Models\\Employee',
      'calculation_method' => 'count',
      'icon' => 'fas fa-file-expired',
      'color' => 'danger',
      'count' => 5,
      'badge_text' => 'Urgent',
      'action' => 
      array (
        'type' => 'button',
        'label' => 'Renew Now',
        'event' => 'showExpiredDocuments',
        'icon' => 'fas fa-exclamation-triangle',
      ),
    ),
    'request_leave_action' => 
    array (
      'type' => 'action-card',
      'title' => 'Quick Request',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'color' => 'primary',
      'description' => 'Submit a new leave request',
      'button_variant' => 'white',
      'action' => 
      array (
        'label' => 'Request Leave',
        'icon' => 'fas fa-calendar-plus',
        'event' => 'openLeaveRequestModal',
        'success_message' => 'Leave request form opened',
        'helper' => 'Opens request form in modal',
      ),
    ),
    'view_calendar_action' => 
    array (
      'type' => 'action-card',
      'title' => 'Team Calendar',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'color' => 'info',
      'description' => 'View team availability',
      'action' => 
      array (
        'label' => 'Open Calendar',
        'icon' => 'fas fa-calendar-alt',
        'url' => '/hr/leave/calendar',
        'helper' => 'Full calendar view',
      ),
    ),
    'approve_all_action' => 
    array (
      'type' => 'action-card',
      'title' => 'Batch Approve',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'color' => 'success',
      'description' => 'Approve all pending requests',
      'action' => 
      array (
        'label' => 'Approve All',
        'icon' => 'fas fa-check-double',
        'count' => 5,
        'event' => 'approveAllPending',
        'confirm' => true,
        'confirm_message' => 'Approve all 5 pending requests?',
        'success_message' => 'All requests approved',
      ),
    ),
    'export_report_action' => 
    array (
      'type' => 'action-card',
      'title' => 'Export Report',
      'size' => 'col-12 col-sm-6 col-lg-3',
      'color' => 'warning',
      'description' => 'Download leave analytics',
      'action' => 
      array (
        'label' => 'Download PDF',
        'icon' => 'fas fa-file-pdf',
        'url' => '/hr/leave/report/pdf',
        'target' => '_blank',
        'helper' => 'Opens in new tab',
      ),
    ),
  ),
);
