

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="time"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="time" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\Attendance"
            pageTitle="Attendance"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'adjustments',
    '1' => 'employee_id',
    '2' => 'leave_request_id',
    '3' => 'attendanceSessions',
    '4' => 'sessions',
    '5' => 'approved_by',
    '6' => 'approved_at',
    '7' => 'last_calculated_at',
    '8' => 'calculation_method',
    '9' => 'is_unplanned',
],
    'onNewForm' => [
    '0' => 'adjustments',
    '1' => 'employee_id',
    '2' => 'needs_review',
    '3' => 'hours_deducted',
    '4' => 'is_paid_absence',
    '5' => 'absence_reason',
    '6' => 'is_unplanned',
    '7' => 'absence_type',
    '8' => 'notes',
    '9' => 'is_approved',
    '10' => 'leave_request_id',
    '11' => 'attendanceSessions',
    '12' => 'sessions',
    '13' => 'is_approved',
    '14' => 'approved_by',
    '15' => 'approved_at',
    '16' => 'last_calculated_at',
    '17' => 'calculation_method',
    '18' => 'is_unplanned',
],
    'onEditForm' => [
    '0' => 'adjustments',
    '1' => 'employee_id',
    '2' => 'needs_review',
    '3' => 'hours_deducted',
    '4' => 'is_paid_absence',
    '5' => 'absence_reason',
    '6' => 'is_unplanned',
    '7' => 'absence_type',
    '8' => 'notes',
    '9' => 'is_approved',
    '10' => 'leave_request_id',
    '11' => 'attendanceSessions',
    '12' => 'sessions',
    '13' => 'approved_by',
    '14' => 'approved_at',
    '15' => 'last_calculated_at',
    '16' => 'calculation_method',
    '17' => 'is_unplanned',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


