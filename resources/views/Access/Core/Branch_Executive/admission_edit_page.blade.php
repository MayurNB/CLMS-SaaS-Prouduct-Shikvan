@extends('layouts.app')
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
<div class="container-fluid pb-5">
    <form action="{{ route('branchAdmissionAction', $admission->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h6 class="mb-0 text-primary">Verification Remarks</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <label class="form-label fw-bold small text-uppercase text-muted">Executive Remarks (Optional)</label>
                <textarea name="remarks" class="form-control" rows="3" placeholder="Enter reason for rejection or verification notes...">{{ $admission->remarks }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mb-5">
    <button type="submit" name="action" value="reject" class="btn btn-lg btn-danger px-5">Reject Application</button>
    <button type="submit" name="action" value="verify" class="btn btn-lg btn-success px-5">Verify & Save</button>
</div>

        @php $currentData = json_decode($admission->form_data, true); @endphp

        @foreach($configs as $type => $fields)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3"><h6 class="mb-0 text-primary">{{ $type }} Details</h6></div>
            <div class="card-body">
                <div class="row g-3">
                   @foreach($fields as $field)
<div class="col-12 col-md-6 col-lg-4">
    <label class="form-label fw-bold small text-uppercase text-muted">{{ $field->field_label }}</label>
    
    {{-- Check for Documents or the specific Portrait field --}}
    @if($field->type == 'Documents' || $field->field_name == 'learner_image_url')
        <div class="document-upload-card border rounded p-2 bg-white shadow-sm">
            <div class="position-relative overflow-hidden rounded bg-dark mb-2" style="height: 200px;">
                @php 
                    $filePath = $currentData[$field->field_name] ?? null; 
                @endphp
                
                <img id="preview-{{ $field->field_name }}" 
                     src="{{ $filePath }}" 
                     class="w-100 h-100 style-contain" style="object-fit: contain;">
                
                <video id="video-{{ $field->field_name }}" class="d-none w-100 h-100" style="object-fit: cover;" autoplay playsinline></video>
            </div>
            
            <div class="controls">
                <input type="file" name="files[{{ $field->field_name }}]" class="d-none" id="file-{{ $field->field_name }}" onchange="handleFileUpload(this, '{{ $field->field_name }}')">
                <div class="btn-group w-100" id="group-init-{{ $field->field_name }}">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.getElementById('file-{{ $field->field_name }}').click()">Change</button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="startInlineCamera('{{ $field->field_name }}')">Camera</button>
                </div>
                {{-- ... include your existing group-cam and group-retake buttons here ... --}}
            </div>
        </div>
        <canvas id="canvas-{{ $field->field_name }}" class="d-none"></canvas>
    @else
        <input type="text" name="form_data[{{ $field->field_name }}]" class="form-control" value="{{ $currentData[$field->field_name] ?? '' }}">
    @endif
</div>
@endforeach
                </div>
            </div>
        </div>
        @endforeach
    </form>
</div>

<script>
let activeStreams = {};

function handleFileUpload(input, fieldName) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-' + fieldName).src = e.target.result;
            document.getElementById('preview-' + fieldName).classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

async function startInlineCamera(fieldName) {
    const video = document.getElementById('video-' + fieldName);
    const preview = document.getElementById('preview-' + fieldName);
    
    // UI Swapping
    preview.classList.add('d-none');
    video.classList.remove('d-none');
    document.getElementById('group-init-' + fieldName).classList.add('d-none');
    document.getElementById('group-retake-' + fieldName).classList.add('d-none');
    document.getElementById('group-cam-' + fieldName).classList.remove('d-none');

    try {
        const stream = await navigator.mediaDevices.getUserMedia({ 
            video: { facingMode: "environment" }, 
            audio: false 
        });
        video.srcObject = stream;
        activeStreams[fieldName] = stream;
    } catch (err) {
        alert("Camera access denied or not available.");
        stopInlineCamera(fieldName);
    }
}

function capturePhoto(fieldName) {
    const video = document.getElementById('video-' + fieldName);
    const canvas = document.getElementById('canvas-' + fieldName);
    const preview = document.getElementById('preview-' + fieldName);

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    const dataUrl = canvas.toDataURL('image/png');
    preview.src = dataUrl;

    // Convert to file for Laravel
    fetch(dataUrl).then(res => res.blob()).then(blob => {
        const file = new File([blob], fieldName + "_capture.png", { type: "image/png" });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('file-' + fieldName).files = dataTransfer.files;
    });

    stopInlineCamera(fieldName, true);
}

function stopInlineCamera(fieldName, isCaptured = false) {
    if (activeStreams[fieldName]) {
        activeStreams[fieldName].getTracks().forEach(track => track.stop());
        delete activeStreams[fieldName];
    }

    document.getElementById('video-' + fieldName).classList.add('d-none');
    document.getElementById('preview-' + fieldName).classList.remove('d-none');
    document.getElementById('group-cam-' + fieldName).classList.add('d-none');
    
    if(isCaptured) {
        document.getElementById('group-retake-' + fieldName).classList.remove('d-none');
    } else {
        document.getElementById('group-init-' + fieldName).classList.remove('d-none');
    }
}
</script>

<style>
    .style-contain { object-fit: contain; background: #222; }
    .document-upload-card { transition: all 0.3s ease; }
    .document-upload-card:hover { border-color: #0d6efd; }
</style>
@endsection