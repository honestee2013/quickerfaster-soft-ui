

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context=""  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\AttendanceSession"
            pageTitle="Work Sessions"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'attendance_id',
    '1' => 'clock_in_event_id',
    '2' => 'clock_out_event_id',
    '3' => 'is_overnight',
    '4' => 'adjusted_by',
    '5' => 'adjusted_at',
    '6' => 'calculated_duration',
    '7' => 'validation_status',
    '8' => 'validation_notes',
],
    'onNewForm' => [
    '0' => 'clock_in_event_id',
    '1' => 'clock_out_event_id',
    '2' => 'is_overnight',
    '3' => 'duration_hours',
    '4' => 'adjusted_by',
    '5' => 'adjusted_at',
    '6' => 'calculated_duration',
    '7' => 'validation_status',
    '8' => 'validation_notes',
],
    'onEditForm' => [
    '0' => 'clock_in_event_id',
    '1' => 'clock_out_event_id',
    '2' => 'is_overnight',
    '3' => 'adjusted_by',
    '4' => 'adjusted_at',
    '5' => 'calculated_duration',
    '6' => 'validation_status',
    '7' => 'validation_notes',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


