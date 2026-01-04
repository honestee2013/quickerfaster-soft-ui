{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.leave/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
    <a href="/hr/leave-requests" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Leave Requests">
        <i class="fas fa-calendar-alt me-2"></i>
        @if ($state === 'full')
            <span>Leave Requests</span>
        @endif
    </a>
</li>


<li class="nav-item text-nowrap">
    <a href="/hr/leave-types" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Leave Types">
        <i class="fas fa-tags me-2"></i>
        @if ($state === 'full')
            <span>Leave Types</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.leave/sidebar-post-links')
