

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="policies"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="policies" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\WorkPattern"
            pageTitle="Work Patterns"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'description',
    '1' => 'override_start_time',
    '2' => 'override_end_time',
    '3' => 'rotation_weeks',
    '4' => 'end_date',
    '5' => 'assigned_employee_count',
    '6' => 'last_used_date',
    '7' => 'created_from_template_id',
],
    'onNewForm' => [
    '0' => 'assigned_employee_count',
    '1' => 'last_used_date',
    '2' => 'created_from_template_id',
],
    'onEditForm' => [
    '0' => 'assigned_employee_count',
    '1' => 'last_used_date',
    '2' => 'created_from_template_id',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


