

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
    '3' => 'pay_multiplier',
    '4' => 'minimum_staffing',
    '5' => 'is_restricted',
    '6' => 'description',
    '7' => 'color',
    '8' => 'templateSource',
    '9' => 'departments',
    '10' => 'attendanceRecords',
    '11' => 'shiftSchedules',
    '12' => 'is_overnight',
    '13' => 'created_from_template_id',
    '14' => 'last_used_date',
    '15' => 'usage_count',
],
    'onNewForm' => [
    '0' => 'attendanceRecords',
    '1' => 'color',
    '2' => 'duration_hours',
    '3' => 'is_overnight',
    '4' => 'created_from_template_id',
    '5' => 'last_used_date',
    '6' => 'usage_count',
],
    'onEditForm' => [
    '0' => 'attendanceRecords',
    '1' => 'color',
    '2' => 'duration_hours',
    '3' => 'is_overnight',
    '4' => 'created_from_template_id',
    '5' => 'last_used_date',
    '6' => 'usage_count',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


