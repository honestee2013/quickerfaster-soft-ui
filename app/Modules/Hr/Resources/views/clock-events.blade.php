

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\ClockEvent"
            pageTitle="Clock Events"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'ip_address',
    '1' => 'device_id',
    '2' => 'device_name',
    '3' => 'sync_status',
    '4' => 'sync_attempts',
],
    'onNewForm' => [
    '0' => 'ip_address',
    '1' => 'device_id',
    '2' => 'device_name',
    '3' => 'sync_status',
    '4' => 'sync_attempts',
],
    'onEditForm' => [
    '0' => 'ip_address',
    '1' => 'device_id',
    '2' => 'device_name',
    '3' => 'sync_status',
    '4' => 'sync_attempts',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


