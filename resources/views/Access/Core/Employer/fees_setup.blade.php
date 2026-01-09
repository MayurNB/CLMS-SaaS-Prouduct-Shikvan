@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Fees Setup') {{-- Changed for clarity for this page --}}

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
                 
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="{{ route('employerProfile') }}">
                  
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
        <li class="nav-item"><a class="nav-link" href="{{ Route('employerDashboard') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('employerProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
        <li class="nav-title">INSTITUTE INFO </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('employerInstituteManage') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> My Institute</a></li>
        
          <ul class="nav-group-items compact">
            
          </ul>
        </li>
        <li class="nav-title">ADMINISTRATION MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Quick Action </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('employerBranch') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches Manages </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('employerBranchWiseLearnerAndFeesTotolInfo') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches View </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses </a></li>
           
          </ul>
        </li>

         
 @endsection

@section('content')

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Fees Setup </a>
            </li>
           
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myCoreUITabContent">
   







<style>
    :root { 
        --primary: #2eb85c; 
        --danger: #e55353; 
        --border: #e2e8f0; 
        --bg: #f8fafc; 
        --text-main: #1e293b; 
    }
    .ent-container { padding: 25px; background: var(--bg); font-family: 'Inter', sans-serif; }
    .ent-card { background: #fff; border: 1px solid var(--border); border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); margin-bottom: 25px; }
    .ent-header { padding: 18px 24px; border-bottom: 1px solid var(--border); background: #fff; border-radius: 12px 12px 0 0; }
    .ent-form-label { font-size: 0.8rem; font-weight: 700; color: #64748b; margin-bottom: 8px; display: block; text-transform: uppercase; }
    .ent-input, .ent-select { width: 100%; padding: 11px 15px; border: 1px solid var(--border); border-radius: 8px; font-size: 0.9rem; outline: none; transition: border 0.2s; }
    .ent-input:focus { border-color: var(--primary); }
    .ent-btn { background: var(--primary); color: #fff; border: none; padding: 11px 25px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.2s; }
    .ent-btn:hover { opacity: 0.9; }
    .btn-deactivate { background: transparent; border: 1px solid var(--danger); color: var(--danger); font-size: 0.75rem; padding: 6px 15px; border-radius: 6px; font-weight: 600; transition: 0.2s; text-decoration: none; }
    .btn-deactivate:hover { background: var(--danger); color: #fff; }
    .badge-common { background: #dcfce7; color: #166534; padding: 5px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; }
    .badge-extra { background: #fef3c7; color: #92400e; padding: 5px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; }
    
    /* CoreUI Modal Styling Overrides */
    .modal-content { border-radius: 12px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
</style>

<div class="ent-container">
    {{-- Header Section --}}
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1 text-info">Fee Configuration</h3>
            <p class="text-primary mb-0">Setup and manage institute-wide fees for future enrollments.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 1. CREATE FEE FORM --}}
    <div class="ent-card">
        <div class="ent-header">
            <h6 class="fw-bold mb-0 text-primary">Define New Fee Item</h6>
        </div>
        <div class="p-4">
            <form action="{{ route('employer.fees.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="ent-form-label">Fee Title</label>
                        <input type="text" name="fee_name" class="ent-input" placeholder="e.g. Admission Charges" required>
                    </div>
                    <div class="col-md-3">
                        <label class="ent-form-label">Price (INR)</label>
                        <input type="number" step="0.01" name="amount" class="ent-input" placeholder="0.00" required>
                    </div>
                    <div class="col-md-2">
                        <label class="ent-form-label">Category</label>
                        <select name="type" class="ent-select">
                            <option value="common">Common</option>
                            <option value="extra">Extra</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="ent-btn w-100">Add Fee</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- 2. FEE LIST TABLE --}}
    <div class="ent-card">
        <div class="ent-header">
            <h6 class="fw-bold mb-0 text-primary">Current Fee Structure</h6>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4" style="font-size: 0.75rem; color: #64748b;">FEE NAME</th>
                        <th style="font-size: 0.75rem; color: #64748b;">CATEGORY</th>
                        <th style="font-size: 0.75rem; color: #64748b;">AMOUNT</th>
                        <th class="text-end pe-4" style="font-size: 0.75rem; color: #64748b;">MANAGEMENT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fees as $f)
                    <tr>
                        <td class="ps-4 fw-bold text-green">{{ $f->fee_name }}</td>
                        <td>
                            <span class="{{ $f->type == 'common' ? 'badge-common' : 'badge-extra' }}">
                                {{ strtoupper($f->type) }}
                            </span>
                        </td>
                        <td class="fw-bold">₹{{ number_format($f->amount, 2) }}</td>
                        <td class="text-end pe-4">
                            @if($f->amount > 0)
                                <form action="{{ route('employer.fees.deactivate', $f->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn-deactivate" onclick="return confirm('Setting this fee to ₹0 will deactivate it. Proceed?')">
                                        Deactivate
                                    </button>
                                </form>
                            @else
                                {{-- COREUI MODAL TRIGGER --}}
                                <button type="button" class="ent-btn py-1 px-3" style="font-size: 0.75rem; background-color: #3c4b64;" 
                                        data-coreui-toggle="modal" 
                                        data-coreui-target="#reactivateModal" 
                                        onclick="setReactivateData('{{ $f->id }}', '{{ $f->fee_name }}')">
                                    Reactivate
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="cil-folder-open d-block mb-2" style="font-size: 2rem;"></i>
                            No fees configured yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- 3. COREUI REACTIVATE MODAL --}}
<div class="modal fade" id="reactivateModal" tabindex="-1" aria-labelledby="reactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('employer.fees.reactivate') }}" method="POST">
                @csrf
                <input type="hidden" name="fee_id" id="modal_fee_id">
                
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="modal-title fw-bold" id="reactivateModalLabel">
                        Reactivate <span id="modal_fee_name" class="text-primary"></span>
                    </h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="ent-form-label">Update Fee Amount (INR)</label>
                        <input type="number" step="0.01" name="amount" class="ent-input" placeholder="0.00" required autofocus>
                    </div>
                    <div class="p-3 bg-light rounded-3">
                        <small class="text-muted">
                            Setting a price will enable this fee for all future enrollment calculations.
                        </small>
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0">
                    <button class="btn btn-light fw-bold" type="button" data-coreui-dismiss="modal">Cancel</button>
                    <button class="ent-btn" type="submit">Update & Activate</button>
                </div>
            </form>
        </div>
    </div>
</div>




      </div> {{-- End card-body --}}
    </div> {{-- End card --}}

  </div>

  @endsection

  {{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

  @push('scripts')

  {{-- ================= JAVASCRIPT ================= --}}

{{-- reactive js --}}

<script>

    /**
     * Pass data to the Reactivation Modal
     */
    function setReactivateData(id, name) {
        document.getElementById('modal_fee_id').value = id;
        document.getElementById('modal_fee_name').innerText = name;
        
        // Optional: Reset amount field when opening
        const amountInput = document.querySelector('#reactivateModal input[name="amount"]');
        if(amountInput) amountInput.value = '';
    }
</script>


  @endpush