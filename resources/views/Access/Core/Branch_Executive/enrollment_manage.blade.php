@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Enrollment Manage') {{-- Changed for clarity for this page --}}

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

<!-- Hidden Logout Form imp-->
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

  @section('content')

  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Enrollment Manage </a>
        </li>
       
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="myCoreUITabContent">
      <div class="container-fluid px-4">

     {{-- ================= FILTER BAR ================= --}}
<form method="GET" class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label small text-muted">Learner Code</label>
                <input type="text" name="learner_code" class="form-control"
                       value="{{ request('learner_code') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label small text-muted">Program</label>
                <input type="text" name="program_name" class="form-control"
                       value="{{ request('program_name') }}">
            </div>

            <div class="col-md-2">
                <label class="form-label small text-muted">Fee Status</label>
                <select name="fee_status" class="form-select">
                    <option value="">All</option>
                    <option value="paid">Paid</option>
                    <option value="partial">Partial</option>
                    <option value="pending">Pending</option>
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label small text-muted">Enrollment Date</label>
                <input type="date" name="enrollment_date" class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i> Search
                </button>
            </div>
        </div>
    </div>
</form>

{{-- ================= ENROLLMENTS TABLE ================= --}}
<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-semibold">
        Enrollment Records
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light small text-muted">
                <tr>
                    <th>Learner</th>
                    <th>Program</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($enrollments as $row)
                <tr>
                    <td>
                        <div class="fw-semibold">{{ $row->raw_learner_name }}</div>
                        <div class="small text-muted">{{ $row->learner_code }}</div>
                    </td>

                    <td>{{ $row->program_name }}</td>

                    <td>₹{{ number_format($row->total_fee_charged,2) }}</td>
                    <td class="text-success">₹{{ number_format($row->paid_amount,2) }}</td>
                    <td class="text-danger">₹{{ number_format($row->balance_fee,2) }}</td>

                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('enrollments.enrollmentManageView', [$row->id,'tab'=>'learner']) }}"
                               class="btn btn-outline-primary">Learner</a>

                            <a href="{{ route('enrollments.enrollmentManageView', [$row->id,'tab'=>'enrollment']) }}"
                               class="btn btn-outline-secondary">Enrollment</a>

                            <a href="{{ route('enrollments.enrollmentManageView', [$row->id,'tab'=>'fees']) }}"
                               class="btn btn-outline-warning">Fees</a>

                            <a href="{{ route('enrollments.enrollmentManageView', [$row->id,'tab'=>'payments']) }}"
                               class="btn btn-outline-success">Payments</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        No enrollment records found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ================= DETAIL MODAL ================= --}}
@isset($selectedEnrollment)
<div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,.45)">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">

            {{-- HEADER --}}
            <div class="modal-header bg-light">
                <div>
                    <h5 class="mb-0">{{ $selectedEnrollment->raw_learner_name }}</h5>
                    <small class="text-muted">
                        {{ $selectedEnrollment->learner_code }} • {{ $selectedEnrollment->program_name }}
                    </small>
                </div>
                <a href="{{ route('enrollments.enrollmentManage') }}" class="btn-close" style="background-color: rgba(255, 255, 255, 0.5);"></a>
            </div>

            {{-- BODY --}}
            <div class="modal-body">

                {{-- TAB NAV --}}
                <ul class="nav nav-pills mb-3">
                    @foreach(['learner','enrollment','fees','payments'] as $t)
                        <li class="nav-item">
                            <a class="nav-link {{ request('tab','learner') === $t ? 'active' : '' }}"
                               href="{{ route('enrollments.enrollmentManageView', [$selectedEnrollment->id,'tab'=>$t]) }}">
                                {{ ucfirst($t) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- ================= LEARNER ================= --}}
                @if(request('tab','learner') === 'learner')
                <div class="row g-3">
                    <div class="col-md-6"><b>Code:</b> {{ $selectedEnrollment->learner_code }}</div>
                    <div class="col-md-6"><b>Name:</b> {{ $selectedEnrollment->raw_learner_name }}</div>
                    <div class="col-md-6"><b>Phone:</b> {{ $selectedEnrollment->raw_phone ?? '-' }}</div>
                    <div class="col-md-6"><b>Email:</b> {{ $selectedEnrollment->raw_email ?? '-' }}</div>
                </div>
                @endif

                {{-- ================= ENROLLMENT ================= --}}
                @if(request('tab') === 'enrollment')
                <p class="mb-1"><b>Program:</b> {{ $selectedEnrollment->program_name }}</p>
                <p class="text-muted small">{{ $selectedEnrollment->description }}</p>

                <table class="table table-sm mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Course</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $d)
                        <tr>
                            <td>{{ $d->course_name }}</td>
                            <td><span class="badge bg-secondary">{{ ucfirst($d->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No courses enrolled</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                @endif

                {{-- ================= FEES ================= --}}
                @if(request('tab') === 'fees')
                <div class="row mb-3">
                    <div class="col-md-4"><b>Total Charged</b><br>₹{{ number_format($fees->total_fee_charged ?? 0,2) }}</div>
                    <div class="col-md-4"><b>Paid</b><br>₹{{ number_format($fees->paid_amount ?? 0,2) }}</div>
                    <div class="col-md-4"><b>Balance</b><br>₹{{ number_format(($fees->total_fee_charged ?? 0) - ($fees->paid_amount ?? 0),2) }}</div>
                </div>

                <div class="row mb-3">
                <div class="col-md-4"><b>Program Fees: </b><br>₹{{ number_format($selectedEnrollment->base_price ?? 0,2) }}</div>
                 <table class="table table-sm mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Course</th>
                            
                            <th class="text-end">Fee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $c)
                        <tr>
                            <td>{{ $c->course_name }}</td>
                            <td class="text-end">₹{{ number_format($c->price,2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No courses enrolled</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>

                <h6>Applied Fees</h6>
                <ul class="list-group list-group-flush mb-3">
                    @forelse($appliedFees as $f)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $f->fee_name }}
                            <span>₹{{ number_format($f->fee_amount,2) }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No applied fees</li>
                    @endforelse
                </ul>

                <h6>Discounts</h6>
                <ul class="list-group list-group-flush">
                    @forelse($discounts as $d)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $d->name }}
                            <span class="text-success">-₹{{ number_format($d->discount_amount,2) }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No discounts</li>
                    @endforelse
                </ul>
                @endif

                {{-- ================= PAYMENTS ================= --}}
                @if(request('tab') === 'payments')
                <table class="table table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Method</th>
                            <th class="text-end">Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $p)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($p->paid_at)->format('d M Y') }}</td>
                            <td>{{ ucfirst($p->payment_method) }}</td>
                            <td class="text-end">₹{{ number_format($p->amount,2) }}</td>
                            <td><span class="badge bg-success">{{ ucfirst($p->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No payments recorded</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>
</div>
@endisset







      </div> {{-- End card-body --}}
    </div> {{-- End card --}}

  </div>

  @endsection

  {{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

  