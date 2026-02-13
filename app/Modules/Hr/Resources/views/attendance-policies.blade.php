

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\AttendancePolicy"
            pageTitle="Attendance Policies"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'description',
    '1' => 'state_code',
    '2' => 'applies_to_shift_categories',
    '3' => 'expiration_date',
    '4' => 'version',
    '5' => 'last_updated_by',
    '6' => 'last_updated_at',
],
    'onNewForm' => [
    '0' => 'version',
    '1' => 'last_updated_by',
    '2' => 'last_updated_at',
],
    'onEditForm' => [
    '0' => 'version',
    '1' => 'last_updated_by',
    '2' => 'last_updated_at',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


