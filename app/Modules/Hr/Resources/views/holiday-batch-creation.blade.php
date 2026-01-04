<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr" />
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="time" moduleName="hr" />
    </x-slot>

    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="time" moduleName="hr" />
    </x-slot>

    <livewire:qf::wizards.wizard-manager wizard-id="holiday_batch_creation" module="hr" />
</x-qf::livewire.bootstrap.layouts.app>