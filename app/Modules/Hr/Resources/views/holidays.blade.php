

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\Holiday"
            pageTitle="Holidays"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'attendanceRecords',
    '1' => 'description',
    '2' => 'recurrence_rule',
    '3' => 'region_code',
    '4' => 'holiday_pay_rate',
    '5' => 'minimum_hours_for_pay',
    '6' => 'half_day_end_time',
    '7' => 'year',
    '8' => 'generated_from_template',
    '9' => 'override_id',
    '10' => 'last_synced_at',
],
    'onNewForm' => [
    '0' => 'attendanceRecords',
    '1' => 'year',
    '2' => 'generated_from_template',
    '3' => 'override_id',
    '4' => 'last_synced_at',
],
    'onEditForm' => [
    '0' => 'attendanceRecords',
    '1' => 'year',
    '2' => 'generated_from_template',
    '3' => 'override_id',
    '4' => 'last_synced_at',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


