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
<div class="container-fluid py-4">
    <div class="row">

        {{-- LEFT: Create New Field --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h5 class="fw-bold text-dark mb-0">Add Form Field</h5>
                    <p class="text-muted small">Define a new input for the admission form.</p>
                </div>

                <div class="card-body px-4 pb-4">

                    {{-- SUCCESS MESSAGE --}}
                    @if(session('success'))
                        <div class="alert alert-success small">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ERROR MESSAGE --}}
                    @if($errors->any())
                        <div class="alert alert-danger small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('admission.form.config.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase">
                                Section / Group
                            </label>
                            <select name="type" class="form-select ent-input" required>
                                <option value="Personal">Personal Details</option>
                                <option value="Academic">Academic History</option>
                                <option value="Guardian">Guardian Info</option>
                                <option value="Documents">Uploads / Documents</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase">
                                Field Label (Visible to Student)
                            </label>
                            <input type="text"
                                   name="field_label"
                                   class="form-control ent-input"
                                   placeholder="e.g. Father's Occupation"
                                   value="{{ old('field_label') }}"
                                   required>
                        </div>

                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="is_required"
                                       id="reqSwitch">
                                <label class="form-check-label fw-bold" for="reqSwitch">
                                    Make this field Mandatory
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100 py-2 fw-bold rounded-3">
                            <i class="cil-plus me-2"></i>
                            Add to Form
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- RIGHT: Existing Configuration --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h5 class="fw-bold text-dark mb-0">Current Form Structure</h5>
                    <p class="text-muted small">
                        These fields will appear on the student admission page.
                    </p>
                </div>

                <div class="card-body p-4">
                    @forelse($configs as $type => $fields)

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-primary-light text-primary p-2 me-2 rounded-2">
                                    <i class="cil-folder"></i>
                                </span>
                                <h6 class="mb-0 fw-800 text-dark">{{ $type }}</h6>
                            </div>

                            <div class="list-group list-group-flush border rounded-3">
                                @foreach($fields as $field)
                                    <div class="list-group-item d-flex justify-content-between align-items-center py-3">

                                        <div>
                                            <span class="fw-bold text-dark">
                                                {{ $field->field_label }}
                                            </span>
                                            <code class="ms-2 small text-muted">
                                                {{ $field->field_name }}
                                            </code>
                                        </div>

                                        <div class="d-flex align-items-center gap-3">

                                            @if($field->is_required)
                                                <span class="badge bg-danger-light text-danger">
                                                    Required
                                                </span>
                                            @else
                                                <span class="badge bg-light text-muted">
                                                    Optional
                                                </span>
                                            @endif

                                            {{-- DELETE FIELD --}}
                                           <form action="{{ route('admission.form.config.delete', $field->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this field?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-ghost-danger">
        <i class="cil-trash"></i>
    </button>
</form>


                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @empty
                        <div class="text-center py-5 border rounded-4 border-dashed">
                            <p class="text-muted mb-0">
                                No fields configured yet. Use the left panel to start.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .ent-input {
        border: 2px solid #edf2f7;
        border-radius: 10px;
        padding: 10px 15px;
    }

    .bg-primary-light {
        background: rgba(50, 31, 219, 0.1);
    }

    .bg-danger-light {
        background: rgba(229, 83, 83, 0.1);
    }

    .fw-800 {
        font-weight: 800;
    }

    .border-dashed {
        border-style: dashed !important;
        border-width: 2px !important;
    }

    .btn-ghost-danger {
        color: #e55353;
        background: transparent;
        border: none;
    }

    .btn-ghost-danger:hover {
        background: rgba(229, 83, 83, 0.1);
    }
</style>
@endsection