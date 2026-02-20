

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\Shift"
            pageTitle="Shifts"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'attendanceRecords',
    '1' => 'required_skills',
    '2' => 'shift_category',
    '3' => 'minimum_staffing',
    '4' => 'is_restricted',
    '5' => 'description',
    '6' => 'color',
    '7' => 'templateSource attendanceRecords',
    '8' => 'shiftSchedules',
    '9' => 'is_overnight',
    '10' => 'created_from_template_id',
    '11' => 'last_used_date',
    '12' => 'usage_count',
],
    'onNewForm' => [
    '0' => 'attendanceRecords',
    '1' => 'color',
    '2' => 'is_overnight',
    '3' => 'created_from_template_id',
    '4' => 'last_used_date',
    '5' => 'usage_count',
],
    'onEditForm' => [
    '0' => 'attendanceRecords',
    '1' => 'color',
    '2' => 'is_overnight',
    '3' => 'created_from_template_id',
    '4' => 'last_used_date',
    '5' => 'usage_count',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


