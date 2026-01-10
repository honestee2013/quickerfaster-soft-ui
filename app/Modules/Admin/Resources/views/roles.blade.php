

<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="admin">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="users & permissions"  moduleName="admin">
    </x-slot>
    
    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="users & permissions" moduleName="admin">
    </x-slot>

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Admin\Models\Role"
            pageTitle="Roles"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'permissions',
],
    'onNewForm' => [
    '0' => 'permissions',
],
    'onEditForm' => [
    '0' => 'permissions',
],
    'onQuery' => [
    '0' => 'permissions',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


