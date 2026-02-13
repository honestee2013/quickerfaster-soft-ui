

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

   
    <livewire:qf::data-tables.data-table-manager :selectedItemId="$id??null" model="App\Modules\Hr\Models\Company"
            pageTitle="Companies"
            queryFilters=[]
            :hiddenFields="[
    'onTable' => [
    '0' => 'billing_country_code',
    '1' => 'billing_postal_code',
    '2' => 'billing_email',
    '3' => 'currency_code',
    '4' => 'timezone',
    '5' => 'subdomain',
    '6' => 'database_name',
    '7' => 'billing_address_line_2',
],
    'onNewForm' => [
    '0' => 'billing_country_code',
    '1' => 'billing_postal_code',
    '2' => 'billing_email',
    '3' => 'currency_code',
    '4' => 'timezone',
    '5' => 'subdomain',
    '6' => 'database_name',
    '7' => 'status',
],
    'onEditForm' => [
    '0' => 'billing_country_code',
    '1' => 'billing_email',
    '2' => 'currency_code',
    '3' => 'timezone',
    '4' => 'subdomain',
    '5' => 'database_name',
],
    'onQuery' => [
    '0' => 'billing_country_code',
    '1' => 'billing_postal_code',
    '2' => 'subdomain',
    '3' => 'database_name',
],
]"
            :queryFilters="[]"
        />
</x-qf::livewire.bootstrap.layouts.app>


