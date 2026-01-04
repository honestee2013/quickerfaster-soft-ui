<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr" />
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="leaves" moduleName="hr" />
    </x-slot>

    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="leaves" moduleName="hr" />
    </x-slot>

    <livewire:qf::wizards.wizard-manager wizard-id="employee_self_service" module="hr" />
</x-qf::livewire.bootstrap.layouts.app>