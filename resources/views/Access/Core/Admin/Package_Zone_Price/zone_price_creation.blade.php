@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Dashboard') {{-- Assuming this is for your breadcrumbs --}}

@section('quick')

 <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Employers Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Subscription Mgt</a></li>
           <!-- <li class="nav-item"><a class="nav-link" href="#">add it new module name</a></li> -->
          </ul>
          <ul class="header-nav ms-auto">
            <b>Welcome Admin!</b>
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
                <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/8.jpg') }}" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-task') }}"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-comment-square') }}"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span>

                </a>
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-credit-card') }}"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                  </svg> Lock Account</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>

@endsection




@section('breadcrumb_item_active', 'Dashboard')



@section('side bar')
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
     <li class="nav-title">Overview</li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ url('#') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
        <li class="nav-title">EMPLOYERS MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Mgt </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Employers Info Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> New Emps Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> onboard Empls Mgt
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>
         <li class="nav-title">USERS MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Users Mgt </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Users Info Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Control Access Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> User Deletion Mgt
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>
         <li class="nav-title">SUBSCRIPTION MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Subscription </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Subscriber details </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Payment details</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Transaction details
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pending Payments </a></li>

            </ul>

        </li>
        <li class="nav-title">PRICE & PACKAGE MGT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Price Package</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Creation Price & Package</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Update Price & Package </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> View
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>

         <li class="nav-title">PRODUCT INFOS & VERSION MGT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Product infos version </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> product version</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> product infos </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> View
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>

        
        <li class="nav-divider"></li>
        <li class="nav-title">SHIKVAN SUPPORT & BILLING</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
            </svg> My Subscription & Billing </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Contact Support</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Legal & Formal Documents </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/404') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Help Center / Documentation</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/500') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Term's & Conditions</a></li>
          </ul>
        </li>
       
        <li class="nav-item"><a class="nav-link text-primary fw-semibold" href="https://coreui.io/product/bootstrap-dashboard-template/" target="_top">
            <svg class="nav-icon text-primary">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
            </svg> Try upgrade</a></li>
      </ul>
  

 @endsection

@section('content')
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">View</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myCoreUITabContent">
            <style>
/* ===== ENTERPRISE ZONE UI ===== */
.zone-box {
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 10px 28px rgba(0,0,0,.08);
    padding: 22px;
    margin-bottom: 26px;
}

.zone-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 12px;
    margin-bottom: 18px;
}

.zone-header h5 {
    margin: 0;
    font-weight: 700;
    color: #111827;
}

.zone-header small {
    color: #6b7280;
}

.zone-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 16px;
}

.zone-label {
    font-weight: 600;
    font-size: 14px;
    color: #374151;
    margin-bottom: 6px;
    display: block;
}

.zone-input,
.zone-textarea,
.zone-select {
    width: 100%;
    height: 46px;
    padding: 10px 14px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 15px;
}

.zone-textarea {
    min-height: 90px;
    height: auto;
}

.zone-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 18px;
}

.zone-btn {
    background: #111827;
    color: #fff;
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    border: none;
}

.zone-status {
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
}

.zone-active {
    background: #dcfce7;
    color: #166534;
}

.zone-inactive {
    background: #fee2e2;
    color: #991b1b;
}

/* Prevent long text breaking UI */
.zone-desc {
    max-width: 260px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

@media (min-width: 768px) {
    .zone-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>

{{-- ================= ZONE CREATION ================= --}}
<div class="zone-box">
    <div class="zone-header">
        <div>
            <h5>Create Pricing Zone</h5>
            <small>Define regional pricing multiplier</small>
        </div>
    </div>

    <form method="POST" action="{{ route('zonePriceByAdmin') }}">
        @csrf

        <div class="zone-grid">

            <div>
                <label class="zone-label">Zone Name *</label>
                <input type="text" name="zone_name" class="zone-input"
                       value="{{ old('zone_name') }}" required>
            </div>

            <div>
                <label class="zone-label">Rate Multiplier *</label>
                <input type="number" step="0.01" name="rate_multiplier"
                       class="zone-input" value="{{ old('rate_multiplier',1.00) }}">
            </div>

            <div>
                <label class="zone-label">Status</label>
                <select name="is_active" class="zone-select">
                    <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div style="grid-column: span 3;">
                <label class="zone-label">Description</label>
                <textarea name="description" class="zone-textarea">{{ old('description') }}</textarea>
            </div>

        </div>

        <div class="zone-actions">
            <button class="zone-btn">Create Zone</button>
        </div>
    </form>
</div>

{{-- ================= ZONE LIST ================= --}}
<div class="zone-box">
    <div class="zone-header">
        <h5>Pricing Zones</h5>
        <small>Active regional pricing rules</small>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Zone</th>
                    <th>Multiplier</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>

            @forelse($zones as $zone)
                <tr>
                    <td>
                        <strong>{{ $zone->zone_name }}</strong>
                        <div class="text-muted small zone-desc">
                            {{ $zone->description ?? '—' }}
                        </div>
                    </td>

                    <td>x {{ number_format($zone->rate_multiplier,2) }}</td>

                    <td>
                        <span class="zone-status {{ $zone->is_active ? 'zone-active' : 'zone-inactive' }}">
                            {{ $zone->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td>{{ \Carbon\Carbon::parse($zone->created_at)->format('Y-m-d') }}</td>

                    <td class="text-end">
                        <a href="#" class="text-primary me-2">Edit</a>
                        <a href="#" class="{{ $zone->is_active ? 'text-danger' : 'text-success' }}">
                            {{ $zone->is_active ? 'Disable' : 'Enable' }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No pricing zones created yet.
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>
</div>
@endsection

{{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}




