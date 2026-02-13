

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\AttendanceAdjustment"
            pageTitle="Adjust Attendance"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'original_net_hours',
    '1' => 'original_status',
    '2' => 'adjusted_by',
    '3' => 'adjusted_at',
],
    'onNewForm' => [
    '0' => 'adjusted_by',
    '1' => 'adjusted_at',
],
    'onEditForm' => [
    '0' => 'adjusted_by',
    '1' => 'adjusted_at',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


