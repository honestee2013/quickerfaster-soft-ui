<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr" />
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="self_service" moduleName="hr" />
    </x-slot>

    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="self_service" moduleName="hr" />
    </x-slot>

    <livewire:qf::wizards.wizard-manager wizard-id="sick_call_report" module="hr" />
</x-qf::livewire.bootstrap.layouts.app>