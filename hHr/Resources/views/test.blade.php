<x-qf::livewire.bootstrap.layouts.app>
    <x-slot name="topNav">
        <livewire:qf::layouts.navs.top-nav moduleName="hr">
    </x-slot>

    <x-slot name="sidebar">
        <livewire:qf::layouts.navs.sidebar context="time"  moduleName="hr">
    </x-slot>

    <x-slot name="bottomBar">
        <livewire:qf::layouts.navs.bottom-bar context="time" moduleName="hr">
    </x-slot>



    <div>
        @php
            $isManager = true;
        @endphp
        <div class="container-fluid py-4">
            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="page-header d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">Leave Dashboard</h3>
                            <p class="text-sm text-muted mb-0">Manage your time off and approvals</p>
                        </div>
                        <div class="d-flex align-items-center">
                            @if ($isManager)
                                <button class="btn btn-sm btn-outline-secondary me-2" id="viewTeamCalendar">
                                    <i class="fas fa-calendar me-1"></i> Team Calendar
                                </button>
                            @endif
                            <button class="btn btn-primary" id="requestLeaveBtn">
                                <i class="fas fa-plus me-1"></i> Request Leave
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Balance Cards -->
            <div class="row mb-4">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card card-bg-gradient border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="text-uppercase text-xs mb-1">Vacation</h6>
                                    <h3 class="mb-0">
                                        <span class="text-success">4</span>
                                        <span class="text-xs text-muted">/ 8 days</span>
                                    </h3>
                                    <p class="text-xs text-muted mb-0">4 days remaining</p>
                                </div>
                                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                    <i class="fas fa-umbrella-beach text-white opacity-8"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card card-bg-gradient border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="text-uppercase text-xs mb-1">Sick Leave</h6>
                                    <h3 class="mb-0">
                                        <span class="text-success">10</span>
                                        <span class="text-xs text-muted">/ 10 days</span>
                                    </h3>
                                    <p class="text-xs text-muted mb-0">Full balance available</p>
                                </div>
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="fas fa-heartbeat text-white opacity-8"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card card-bg-gradient border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="text-uppercase text-xs mb-1">Pending</h6>
                                    <h3 class="mb-0">2</h3>
                                    <p class="text-xs text-muted mb-0">Awaiting approval</p>
                                </div>
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="fas fa-clock text-white opacity-8"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="#pendingSection" class="text-xs text-warning text-decoration-none">
                                    <i class="fas fa-arrow-right me-1"></i> Review requests
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card card-bg-gradient border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="text-uppercase text-xs mb-1">Upcoming</h6>
                                    <h3 class="mb-0">1</h3>
                                    <p class="text-xs text-muted mb-0">Next 30 days</p>
                                </div>
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-plane text-white opacity-8"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="#upcomingSection" class="text-xs text-primary text-decoration-none">
                                    <i class="fas fa-calendar me-1"></i> View calendar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Manager Section: Pending Approvals -->
            @if ($isManager)
                <div class="row mb-4" id="pendingSection">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">Pending Approvals</h6>
                                        <p class="text-sm text-muted mb-0">Leave requests from your team</p>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning">3 pending</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="ps-4">Employee</th>
                                                <th>Type</th>
                                                <th>Dates</th>
                                                <th>Days</th>
                                                <th class="text-end pe-4">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-2">
                                                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                                                class="rounded-circle" alt="John Doe">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-sm">John Doe</h6>
                                                            <p class="text-xs text-muted mb-0">Software Engineer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">Vacation</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">Jan 15-17, 2024</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm font-weight-bold">3 days</span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button class="btn btn-success btn-sm me-1" title="Approve">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" title="Deny">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-2">
                                                            <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=random"
                                                                class="rounded-circle" alt="Jane Smith">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-sm">Jane Smith</h6>
                                                            <p class="text-xs text-muted mb-0">Product Manager</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Sick Leave</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">Jan 18, 2024</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm font-weight-bold">1 day</span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button class="btn btn-success btn-sm me-1" title="Approve">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" title="Deny">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-2">
                                                            <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=random"
                                                                class="rounded-circle" alt="Mike Johnson">
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-sm">Mike Johnson</h6>
                                                            <p class="text-xs text-muted mb-0">Designer</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">Vacation</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">Feb 1-5, 2024</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm font-weight-bold">5 days</span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <button class="btn btn-success btn-sm me-1" title="Approve">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" title="Deny">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <div class="text-sm text-muted">
                                        Showing 3 of 5 pending requests
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        View All Pending
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- My Leave Requests -->
            <div class="row" id="upcomingSection">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">My Leave Requests</h6>
                                    <p class="text-sm text-muted mb-0">Your recent and upcoming time off</p>
                                </div>
                                <div>
                                    <div class="btn-group" role="group">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-secondary active">All</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Pending</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Approved</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="ps-4">Type</th>
                                            <th>Dates</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th class="text-end pe-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-info me-2">V</span>
                                                    <span class="text-sm">Vacation</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-sm">Jan 15-17, 2024</span>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-bold">3 days</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-outline-danger" title="Cancel Request">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-success me-2">S</span>
                                                    <span class="text-sm">Sick Leave</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-sm">Jan 5, 2024</span>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-bold">1 day</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Approved</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-outline-secondary" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-info me-2">V</span>
                                                    <span class="text-sm">Vacation</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-sm">Mar 10-15, 2024</span>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-bold">6 days</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Approved</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-outline-secondary" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-danger me-2">V</span>
                                                    <span class="text-sm">Vacation</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-sm">Dec 20-22, 2023</span>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-bold">3 days</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger">Denied</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-outline-secondary" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-sm text-muted">
                                        Showing 4 requests
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary me-2">
                                            <i class="fas fa-download me-1"></i> Export
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-print me-1"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Time Off Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header pb-0">
                            <h6 class="mb-0">Upcoming Time Off</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div
                                            class="icon icon-shape icon-sm bg-gradient-info shadow-info text-center rounded-circle me-3">
                                            <i class="fas fa-plane text-white opacity-8"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm">Your Approved Leave</h6>
                                            <p class="text-xs text-muted mb-0">Mar 10-15, 2024 (6 days)</p>
                                        </div>
                                    </div>
                                </div>
                                @if ($isManager)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div
                                                class="icon icon-shape icon-sm bg-gradient-warning shadow-warning text-center rounded-circle me-3">
                                                <i class="fas fa-users text-white opacity-8"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-sm">Team Out Next Week</h6>
                                                <p class="text-xs text-muted mb-0">2 team members on leave</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CSS for the dashboard (add to your stylesheet) -->
        <style>
            .card-bg-gradient {
                background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
                border: 1px solid #e9ecef;
            }

            .icon-shape {
                width: 48px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .icon-sm {
                width: 36px;
                height: 36px;
            }

            .avatar {
                width: 32px;
                height: 32px;
            }

            .table thead th {
                border-bottom: 2px solid #e9ecef;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.75rem;
                letter-spacing: 0.5px;
            }

            .table tbody tr:hover {
                background-color: #f8f9fa;
            }

            .page-header {
                border-bottom: 1px solid #e9ecef;
                padding-bottom: 1rem;
                margin-bottom: 2rem;
            }

            .progress {
                border-radius: 2px;
            }
        </style>

        <!-- JavaScript for interactions (add to your scripts) -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Request Leave Button
                const requestLeaveBtn = document.getElementById('requestLeaveBtn');
                if (requestLeaveBtn) {
                    requestLeaveBtn.addEventListener('click', function() {
                        // This will trigger your Livewire modal
                        Livewire.emit('openLeaveRequestModal');
                    });
                }

                // View Team Calendar Button
                const viewTeamCalendarBtn = document.getElementById('viewTeamCalendar');
                if (viewTeamCalendarBtn) {
                    viewTeamCalendarBtn.addEventListener('click', function() {
                        window.location.href = '/hr/leave/calendar';
                    });
                }

                // Approve/Deny buttons in manager section
                document.querySelectorAll('.btn-success').forEach(btn => {
                    if (btn.closest('td')) {
                        btn.addEventListener('click', function() {
                            const row = this.closest('tr');
                            const employeeName = row.querySelector('h6.text-sm').textContent;
                            if (confirm(`Approve leave request for ${employeeName}?`)) {
                                // Add your approval logic here
                                this.innerHTML = '<i class="fas fa-check"></i> Approved';
                                this.classList.remove('btn-success');
                                this.classList.add('btn-outline-success');
                                this.disabled = true;

                                // Disable the deny button in same row
                                const denyBtn = row.querySelector('.btn-danger');
                                if (denyBtn) {
                                    denyBtn.disabled = true;
                                }
                            }
                        });
                    }
                });

                document.querySelectorAll('.btn-danger').forEach(btn => {
                    if (btn.closest('td')) {
                        btn.addEventListener('click', function() {
                            const row = this.closest('tr');
                            const employeeName = row.querySelector('h6.text-sm').textContent;
                            if (confirm(`Deny leave request for ${employeeName}?`)) {
                                // Add your denial logic here
                                this.innerHTML = '<i class="fas fa-times"></i> Denied';
                                this.classList.remove('btn-danger');
                                this.classList.add('btn-outline-danger');
                                this.disabled = true;

                                // Disable the approve button in same row
                                const approveBtn = row.querySelector('.btn-success');
                                if (approveBtn) {
                                    approveBtn.disabled = true;
                                }
                            }
                        });
                    }
                });

                // Filter buttons in My Leave Requests
                document.querySelectorAll('.btn-group .btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Remove active class from all buttons in group
                        this.parentElement.querySelectorAll('.btn').forEach(b => {
                            b.classList.remove('active');
                        });
                        // Add active class to clicked button
                        this.classList.add('active');

                        // Add your filtering logic here
                        const filterType = this.textContent.toLowerCase();
                        console.log(`Filter by: ${filterType}`);
                    });
                });
            });
        </script>

    </div>


    </x-qf::livewire.bootstrap.layouts.app>
