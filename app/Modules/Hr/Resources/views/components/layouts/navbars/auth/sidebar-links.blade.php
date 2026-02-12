{{-- Sidebar Links for hr --}}

@include('hr.views::components.layouts.navbars.auth.sidebar-pre-links')

{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
{{-- Generated Links --}}
<li class="nav-item text-nowrap">
<a href="/hr/documents" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Documents">
<i class="fas fa-file-alt me-2"></i>
@if ($state === 'full')
<span>Documents</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/leave-balances" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Leave Balances">
<i class="fas fa-scale-balanced me-2"></i>
@if ($state === 'full')
<span>Leave Balances</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/leave-approvers" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Leave Approvers">
<i class="fas fa-user-shield me-2"></i>
@if ($state === 'full')
<span>Leave Approvers</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/attendance-adjustments" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Attendance Adjustments">
<i class="fas fa-edit me-2"></i>
@if ($state === 'full')
<span>Attendance Adjustments</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
<a href="/hr/clock-events" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
data-bs-placement="right" title="Clock Events">
<i class="fas fa-clock me-2"></i>
@if ($state === 'full')
<span>Clock Events</span>
@endif
</a>
</li>
<li class="nav-item text-nowrap">
    <a href="/hr/attendance-sessions" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Attendance Sessions">
        <i class="fas fa-hourglass-half me-2"></i>
        @if ($state === 'full')
            <span>Attendance Sessions</span>
        @endif
    </a>
</li>

@include('hr.views::components.layouts.navbars.auth.sidebar-post-links')
