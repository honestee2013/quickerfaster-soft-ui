{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.time/sidebar-pre-links')

{{-- Generated Links --}}
<li class="nav-item text-nowrap">
    <a href="/hr/attendances" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Attendance">
        <i class="fas fa-user-clock me-2"></i>
        @if ($state === 'full')
            <span>Attendance</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.time/sidebar-post-links')
