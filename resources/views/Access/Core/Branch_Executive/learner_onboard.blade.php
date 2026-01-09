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

  @section('content')

  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Learner Onboard </a>
        </li>
       
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="myCoreUITabContent">
      <style>
/* ================= ENTERPRISE UI ================= */
.clms-box {
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    padding: 16px;
    font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    margin-bottom: 24px;
}

/* Header */
.clms-header {
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 12px;
    margin-bottom: 18px;
}
.clms-header h5,
.clms-header h6 {
    margin: 0;
    font-weight: 700;
    color: #111827;
}
.clms-header small {
    font-size: 13px;
    color: #6b7280;
}

/* Grid */
.clms-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 14px;
}

/* Labels */
.clms-label {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
    display: block;
}

/* Inputs */
.clms-input,
.clms-select {
    width: 100%;
    height: 48px;
    padding: 10px 14px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    background: #ffffff;
    font-size: 15px;
    color: #111827;
    outline: none;
}
.clms-input:focus,
.clms-select:focus {
    border-color: #111827;
    box-shadow: 0 0 0 3px rgba(17,24,39,0.12);
}

/* Button */
.clms-action {
    display: flex;
    justify-content: flex-end;
    margin-top: 18px;
}
.clms-btn {
    height: 50px;
    padding: 0 28px;
    border-radius: 12px;
    border: none;
    background: #111827;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}
.clms-btn:hover {
    background: #000000;
}

/* ===== TODAY LEARNERS ===== */
.clms-count {
    font-size: 13px;
    font-weight: 600;
    background: #f3f4f6;
    padding: 4px 10px;
    border-radius: 999px;
}

.clms-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.clms-item {
    display: grid;
    grid-template-columns: 1fr;
    gap: 6px;
    padding: 12px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    background: #fafafa;
}

.clms-name {
    font-weight: 700;
    color: #111827;
}
.clms-meta {
    font-size: 13px;
    color: #4b5563;
}

/* Responsive */
@media (min-width: 768px) {
    .clms-box {
        padding: 24px;
    }
    .clms-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .clms-item {
        grid-template-columns: repeat(4, 1fr);
        align-items: center;
    }
}
@media (min-width: 1024px) {
    .clms-box {
        padding: 28px;
    }
    .clms-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>

<!-- ================= LEARNER FORM ================= -->
<div class="clms-box">
    <div class="clms-header">
        <h5>Learner Onboarding</h5>
        <small>Add new learner securely</small>
    </div>

    <form method="POST" action="{{ route('branchExecutive.storeLearner') }}">
        @csrf

        <div class="clms-grid">

            <div>
                <label class="clms-label">First Name *</label>
                <input type="text" name="first_name" class="clms-input" required>
            </div>

            <div>
                <label class="clms-label">Last Name *</label>
                <input type="text" name="last_name" class="clms-input" required>
            </div>

            <div>
                <label class="clms-label">Gender *</label>
                <select name="gender" class="clms-select" required>
                    <option value="" disabled selected>Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div>
                <label class="clms-label">Email *</label>
                <input type="email" name="email" class="clms-input" required>
            </div>

            <div>
                <label class="clms-label">Phone *</label>
                <input type="text" name="phone" class="clms-input" required>
            </div>

        </div>

        <div class="clms-action">
            <button type="submit" class="clms-btn">
                Onboard Learner
            </button>
        </div>
    </form>
</div>

<!-- ================= TODAY LEARNERS ================= -->
<div class="clms-box">

    <div class="clms-header" style="display:flex;justify-content:space-between;align-items:center;">
        <h6>Today’s Learners</h6>
        <span class="clms-count">{{ count($LearnersData ?? []) }} Added</span>
    </div>

    <div class="clms-list">

        @forelse($LearnersData ?? [] as $learner)
            <div class="clms-item">
                <div class="clms-name">
                    {{ $learner->raw_learner_name }}
                </div>
                <div class="clms-meta">{{ $learner->raw_email }}</div>
                <div class="clms-meta">{{ $learner->raw_phone }}</div>
                <div class="clms-meta">{{ $learner->gender }}</div>
            </div>
        @empty
            <div class="clms-meta">No learners added today.</div>
        @endforelse

    </div>
</div>




      </div> {{-- End card-body --}}
    </div> {{-- End card --}}

  </div>

  @endsection

  {{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

  