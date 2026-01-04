

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="leave"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="leave" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\LeaveRequest"
            pageTitle="Leave Requests"
            queryFilters=[]
            :hiddenFields="[
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
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


