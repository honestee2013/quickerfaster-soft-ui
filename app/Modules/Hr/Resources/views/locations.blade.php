

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="settings"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="settings" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\Location"
            pageTitle="Locations"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'geofence_radius',
    '1' => 'longitude',
    '2' => 'latitude',
    '3' => 'closing_date',
    '4' => 'opening_date',
    '5' => 'opening_hours',
    '6' => 'capacity',
    '7' => 'is_remote',
    '8' => 'timezone',
    '9' => 'website',
    '10' => 'email',
    '11' => 'postal_code',
    '12' => 'address_line_2',
    '13' => 'clockEvents',
    '14' => 'departments',
    '15' => 'employees',
    '16' => 'external_id',
    '17' => 'last_synced_at',
    '18' => 'employee_count',
    '19' => 'department_count',
],
    'onNewForm' => [
    '0' => 'clockEvents',
    '1' => 'departments',
    '2' => 'employees',
    '3' => 'external_id',
    '4' => 'last_synced_at',
    '5' => 'employee_count',
    '6' => 'department_count',
],
    'onEditForm' => [
    '0' => 'clockEvents',
    '1' => 'departments',
    '2' => 'employees',
    '3' => 'external_id',
    '4' => 'last_synced_at',
    '5' => 'employee_count',
    '6' => 'department_count',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


