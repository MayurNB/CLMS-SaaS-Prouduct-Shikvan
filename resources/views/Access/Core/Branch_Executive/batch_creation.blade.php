@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Learner Onboard') {{-- Changed for clarity for this page --}}

@section('quick')

<div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          
          <ul class="header-nav ms-auto">
            {{--<li class="nav-item"><a class="nav-link" href="#">
                
             <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md">
                    <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                </svg>
            </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                 
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="{{ route('employerProfile') }}">
                  
              </div>
            </li>
            </a></li>--}}
                
          {{--  <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                </svg></a></li> --}}
          </ul>
          <ul class="header-nav">
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                <svg class="icon icon-lg theme-icon-active">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                </svg>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-sun') }}"></use>
                    </svg>Light
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-moon') }}"></use>
                    </svg>Dark
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                    </svg>Auto
                  </button>
                </li>
              </ul>
            </li>
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                @php
    $user = Auth::user();
    $userProfile = $user->userProfile ?? null;
    $picture = $userProfile->profile_picture_url ?? null;
@endphp

<div class="avatar avatar-md">

    @if(!empty($picture))
        <img class="avatar-img" src="{{ $picture }}" alt="User Profile Picture">
    @else
        <span style="font-size: 14px; color: #555;">Profile</span>
    @endif

</div>

              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                 
                  <!-- Hidden logout form -->
<!-- ✅ Logout (Styled Like CoreUI Dropdown Item) -->
<a class="dropdown-item" href="#" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
  <svg class="icon me-2">
    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
  </svg>
  Logout
</a>

<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf

</form>
              </div>
            </li>
          </ul>
        </div>

@endsection






@section('side bar')
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
     <li class="nav-title">Overview</li>
        <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveDashboard') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('branchExecutiveProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>

          <ul class="nav-group-items compact">
            
          </ul>
        </li>
        <li class="nav-title">Administration & Compliance</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Administration</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveInstitute') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> My Institute </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveBranch') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches Manages </a></li>
            
          </ul>
        </li>

        <li class="nav-title">People Management (The Staff & The Learners)</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>People Management</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('learnerOnboard') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Onboard </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('learnerNewEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Enrollment </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('fees.payments.page') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Fees Payment </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('enrollments.enrollmentManage') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Manage </a></li>
            
          </ul>
        </li>

        <li class="nav-title">Academic & Schedule</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Academic & Schedule</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses  </a></li>
           
          </ul>
        </li>
        

  @endsection


@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    /* Force Light Mode Styles */
    .theme-locked-light {
        background-color: #f8f9fa !important;
        color: #212529 !important;
    }
    .ent-card {
        background: #ffffff !important;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .ent-label {
        font-size: 11px;
        font-weight: 700;
        color: #64748b !important;
        text-transform: uppercase;
        display: block;
        margin-bottom: 5px;
    }
    .ent-input {
        font-size: 13px;
        background-color: #ffffff !important;
        color: #212529 !important;
        border: 1px solid #d1d5db !important;
    }
    /* Table Fixes for Light Mode */
    .light-table-card { background: #ffffff !important; }
    .light-table-card .table { color: #212529 !important; }
    .light-table-card .bg-light { background-color: #f8f9fa !important; }
    .light-table-card tbody tr:hover { background-color: rgba(0,0,0,.04) !important; }
</style>
@endpush

@section('content')
<div class="container-fluid px-4 py-3 theme-locked-light" data-coreui-theme="light">
    
    <div class="ent-card p-4">
        <h5 class="fw-bold mb-3 text-dark">Create Batch</h5>

        @if(session('success'))
            <div class="alert alert-success small">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('batches.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="ent-label">Program</label>
                    <select name="program_id" class="form-select ent-input" required>
                        <option value="">Select Program</option>
                        @foreach($programs as $p)
                            <option value="{{ $p->id }}">{{ $p->program_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="ent-label">Batch Code</label>
                    <input type="text" name="batch_code" class="form-control ent-input" required>
                </div>

                <div class="col-md-3">
                    <label class="ent-label">Academic Year</label>
                    <input type="text" name="academic_year" placeholder="2025-26" class="form-control ent-input" required>
                </div>

                <div class="col-md-6">
                    <label class="ent-label">Batch Name</label>
                    <input type="text" name="batch_name" class="form-control ent-input" required>
                </div>

                <div class="col-md-3">
                    <label class="ent-label">Max Size</label>
                    <input type="number" name="max_size" class="form-control ent-input" required>
                </div>

                <div class="col-md-3">
                    <label class="ent-label">Batch Type</label>
                    <select name="batch_type" class="form-select ent-input">
                        <option value="regular">Regular</option>
                        <option value="weekend">Weekend</option>
                        <option value="fast_track">Fast Track</option>
                        <option value="online">Online</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="ent-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control ent-input" required>
                </div>

                <div class="col-md-3">
                    <label class="ent-label">End Date</label>
                    <input type="date" name="end_date" class="form-control ent-input" required>
                </div>

                <div class="col-md-12">
                    <label class="ent-label">Description</label>
                    <textarea name="description" rows="3" class="form-control ent-input"></textarea>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-dark px-4">Create Batch</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card border-0 shadow-sm mt-4 light-table-card">
        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0 text-dark">Batches List</h5>
            <span class="badge bg-light text-muted border text-dark">{{ $batches->count() }} Total Batches</span>
        </div>

        <div class="card-body p-0">
            @if($batches->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-inbox text-muted display-6"></i>
                    <p class="text-muted mt-2">No batches created for this branch yet.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 text-uppercase fs-xs fw-semibold text-muted" style="font-size: 0.75rem;">Batch Code</th>
                                <th class="text-uppercase fs-xs fw-semibold text-muted" style="font-size: 0.75rem;">Batch Name</th>
                                <th class="text-uppercase fs-xs fw-semibold text-muted" style="font-size: 0.75rem;">Program</th>
                                <th class="text-uppercase fs-xs fw-semibold text-muted" style="font-size: 0.75rem;">Timeline</th>
                                <th class="text-uppercase fs-xs fw-semibold text-muted" style="font-size: 0.75rem;">Status</th>
                                <th class="text-uppercase fs-xs fw-semibold text-muted" style="font-size: 0.75rem;">Capacity</th>
                                <th class="pe-4 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($batches as $b)
                                @php
                                    $fillPercentage = ($b->max_size > 0) ? ($b->current_size / $b->max_size) * 100 : 0;
                                    $progressColor = $fillPercentage >= 90 ? 'bg-danger' : ($fillPercentage >= 70 ? 'bg-warning' : 'bg-success');
                                @endphp
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-primary">{{ $b->batch_code }}</span>
                                        <div class="text-muted" style="font-size: 0.7rem;">AY {{ $b->academic_year }}</div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $b->batch_name }}</div>
                                    </td>
                                    <td>
                                        <span class="text-secondary small">{{ $b->program->program_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center small">
                                            <span class="text-dark">{{ \Carbon\Carbon::parse($b->start_date)->format('d M') }}</span>
                                            <i class="bi bi-arrow-right mx-2 text-muted"></i>
                                            <span class="text-dark">{{ \Carbon\Carbon::parse($b->end_date)->format('d M Y') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill {{ $b->status == 'active' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }} px-3">
                                            {{ ucfirst($b->status) }}
                                        </span>
                                    </td>
                                    <td style="min-width: 120px;">
                                        <div class="d-flex justify-content-between mb-1 small text-dark">
                                            <span>{{ $b->current_size }}/{{ $b->max_size }}</span>
                                            <span>{{ round($fillPercentage) }}%</span>
                                        </div>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar {{ $progressColor }}" role="progressbar" style="width: {{ $fillPercentage }}%"></div>
                                        </div>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-outline-light text-dark border shadow-sm">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection


  {{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

  @push('scripts')
<script>

</script>


  @endpush