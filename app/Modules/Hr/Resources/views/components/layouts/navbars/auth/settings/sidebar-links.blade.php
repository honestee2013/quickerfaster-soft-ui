{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.settings/sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/locations" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Locations">
<i class="fas fa-map-marker-alt me-2"></i>
@if ($state === 'full')
<span>Locations</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/companies" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Companies">
<i class="fas fa-building me-2"></i>
@if ($state === 'full')
<span>Companies</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/departments" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Departments">
<i class="fas fa-sitemap me-2"></i>
@if ($state === 'full')
<span>Departments</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/job-titles" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Job Titles">
        <i class="fas fa-briefcase me-2"></i>
        @if ($state === 'full')
            <span>Job Titles</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.settings/sidebar-post-links')
