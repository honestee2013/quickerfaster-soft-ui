

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    
    
    

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\AttendanceSession"
            pageTitle="Work Sessions"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'attendance_id',
    '1' => 'clock_in_event_id',
    '2' => 'clock_out_event_id',
],
    'onNewForm' => [],
    'onEditForm' => [
    '0' => 'attendance_id',
    '1' => 'clock_in_event_id',
    '2' => 'clock_out_event_id',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


