{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.policies/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/attendance-policies" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Attendance Policies">
<i class="fas fa-gavel me-2"></i>
@if ($state === 'full')
<span>Attendance Policies</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/work-patterns" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Work Patterns">
        <i class="fas fa-calendar-week me-2"></i>
        @if ($state === 'full')
            <span>Work Patterns</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.policies/sidebar-post-links')
