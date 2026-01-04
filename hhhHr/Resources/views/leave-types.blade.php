

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="leave"  moduleName="hr">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="leave" moduleName="hr">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\LeaveType"
            pageTitle="Leave Types"
            queryFilters=[]
            :hiddenFields="[]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


