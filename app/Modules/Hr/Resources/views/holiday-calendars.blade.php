

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\HolidayCalendar"
            pageTitle="Holiday Calendars"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'locations',
    '1' => 'departments',
    '2' => 'holidays',
    '3' => 'holiday_count',
    '4' => 'last_updated',
],
    'onNewForm' => [
    '0' => 'holiday_count',
    '1' => 'last_updated',
],
    'onEditForm' => [
    '0' => 'holiday_count',
    '1' => 'last_updated',
],
    'onQuery' => [],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


