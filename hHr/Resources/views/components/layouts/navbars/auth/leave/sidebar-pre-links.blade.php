{{-- Pre-links section for hr sidebar --}}

<li class="nav-item text-nowrap">
    <a href="/hr/leave-types" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Leave Types">
        <i class="fas fa-tags me-2"></i>
        @if ($state === 'full')
            <span>My Leave</span>
        @endif
    </a>
</li>

<li class="nav-item text-nowrap">
    <a href="/hr/leave-types" class="nav-link d-flex align-items-center" data-bs-toggle="tooltip" wire:ignore.self
        data-bs-placement="right" title="Leave Types">
        <i class="fas fa-tags me-2"></i>
        @if ($state === 'full')
            <span>Pending Approval</span>
        @endif
    </a>
</li>


