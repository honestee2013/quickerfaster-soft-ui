

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
    '0' => 'leave_request_id',
    '1' => 'attendanceSessions',
    '2' => 'sessions',
    '3' => 'approved_by',
    '4' => 'approved_at',
    '5' => 'last_calculated_at',
    '6' => 'calculation_method',
    '7' => 'is_unplanned',
],
    'onNewForm' => [
    '0' => 'needs_review',
    '1' => 'hours_deducted',
    '2' => 'is_paid_absence',
    '3' => 'absence_reason',
    '4' => 'is_unplanned',
    '5' => 'absence_type',
    '6' => 'notes',
    '7' => 'is_approved',
    '8' => 'leave_request_id',
    '9' => 'attendanceSessions',
    '10' => 'sessions',
    '11' => 'is_approved',
    '12' => 'approved_by',
    '13' => 'approved_at',
    '14' => 'last_calculated_at',
    '15' => 'calculation_method',
    '16' => 'is_unplanned',
],
    'onEditForm' => [
    '0' => 'needs_review',
    '1' => 'hours_deducted',
    '2' => 'is_paid_absence',
    '3' => 'absence_reason',
    '4' => 'is_unplanned',
    '5' => 'absence_type',
    '6' => 'notes',
    '7' => 'is_approved',
    '8' => 'leave_request_id',
    '9' => 'attendanceSessions',
    '10' => 'sessions',
    '11' => 'approved_by',
    '12' => 'approved_at',
    '13' => 'last_calculated_at',
    '14' => 'calculation_method',
    '15' => 'is_unplanned',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


