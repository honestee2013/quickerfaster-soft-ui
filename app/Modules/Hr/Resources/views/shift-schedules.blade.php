

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\ShiftSchedule"
            pageTitle="Shift Schedules"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'actual_start_time',
    '1' => 'actual_end_time',
    '2' => 'approved_by',
    '3' => 'approved_at',
    '4' => 'attendance_id',
    '5' => 'published_at',
    '6' => 'created_from_template',
    '7' => 'last_modified_by',
    '8' => 'last_modified_at',
],
    'onNewForm' => [
    '0' => 'actual_start_time',
    '1' => 'actual_end_time',
    '2' => 'approved_by',
    '3' => 'approved_at',
    '4' => 'attendance_id',
    '5' => 'published_at',
    '6' => 'created_from_template',
    '7' => 'last_modified_by',
    '8' => 'last_modified_at',
],
    'onEditForm' => [
    '0' => 'actual_start_time',
    '1' => 'actual_end_time',
    '2' => 'approved_by',
    '3' => 'approved_at',
    '4' => 'attendance_id',
    '5' => 'created_from_template',
    '6' => 'last_modified_by',
    '7' => 'last_modified_at',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


