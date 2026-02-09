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
<style>
    .slot-card { border-left: 4px solid #3c4b64; transition: all 0.2s; position: relative; }
    .slot-card:hover { box-shadow: 0 4px 8px rgba(0,0,0,0.12); }
    .clash-card { border-left-color: #e55353 !important; background-color: #fff5f5; }
    .sticky-planner-header { position: sticky; top: 0; z-index: 1020; background: #ebedef; padding: 10px 0; }
    .batch-tag-container { display: flex; flex-wrap: wrap; gap: 4px; }
    .loading-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.7); display: none; z-index: 9999; justify-content: center; align-items: center; }
</style>

<div class="loading-overlay" id="globalLoader">
    <div class="spinner-border text-primary" role="status"></div>
</div>

<div class="container-fluid px-4">
    {{-- Top Control Bar --}}
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="w-50">
                <label class="small fw-bold text-uppercase text-muted">Select Program to Plan</label>
                <select id="programSelect" class="form-select form-select-lg" onchange="initPlanner(this.value)">
                    <option value="">Choose a program...</option>
                    @foreach($programs as $p)
                        <option value="{{ $p->id }}">{{ $p->program_name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="actionButtons" class="d-none">
                <button class="btn btn-outline-secondary me-2" onclick="printTimetable()">Print PDF</button>
                <button class="btn btn-primary px-4" id="saveBtn" onclick="submitTimetable()">Save Timetable</button>
            </div>
        </div>
    </div>

    <div id="plannerWrapper" class="d-none">
        <div class="row">
            {{-- Analytics Sidebar --}}
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header fw-bold bg-white">Faculty Utilization</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" id="facultyList">
                            <li class="list-group-item small text-muted">No instructors assigned</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Main Planner --}}
            <div class="col-lg-9">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $index => $day)
                            <li class="nav-item">
                                <a class="nav-link {{ $index==0?'active':'' }}" data-coreui-toggle="tab" href="#tab-{{ $day }}" role="tab">
                                    {{ $day }} <span class="badge badge-sm bg-secondary ms-1 day-count" id="count-{{ $day }}">0</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content border-start border-bottom border-end bg-white">
                        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $index => $day)
                            <div class="tab-pane p-3 {{ $index==0?'active':'' }}" id="tab-{{ $day }}" role="tabpanel">
                                <div id="container-{{ $day }}" class="d-flex flex-column gap-3">
                                    {{-- Slots go here --}}
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-sm btn-outline-primary border-dashed w-100 py-2" onclick="addSlot('{{ $day }}')">
                                        + Add Session to {{ $day }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SLOT TEMPLATE --}}
<template id="slotTemplate">
    <div class="card slot-card mb-2 shadow-sm">
        <div class="card-body p-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="small text-muted fw-bold">Course & Instructor</label>
                    <select class="form-select form-select-sm course-sel mb-2"></select>
                    <select class="form-select form-select-sm instructor-sel"></select>
                </div>
                <div class="col-md-3">
                    <label class="small text-muted fw-bold">Target Batches</label>
                    <div class="batch-checks border rounded p-2 bg-light small" style="max-height: 80px; overflow-y: auto;"></div>
                </div>
                <div class="col-md-2">
                    <label class="small text-muted fw-bold">Time</label>
                    <input type="time" class="form-control form-control-sm start-time mb-1" onchange="refreshAll()">
                    <input type="time" class="form-control form-control-sm end-time" onchange="refreshAll()">
                </div>
                <div class="col-md-2">
                    <label class="small text-muted fw-bold">Room</label>
                    <input type="text" class="form-control form-control-sm classroom-input" placeholder="e.g. Lab 1">
                </div>
                <div class="col-md-1 d-flex align-items-end justify-content-end">
                    <button class="btn btn-outline-danger btn-sm border-0" onclick="removeSlot(this)">
                        <svg class="icon"><use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use></svg>
                    </button>
                </div>
                <div class="col-12 clash-section d-none">
                    <div class="alert alert-danger py-1 px-2 mb-0 small clash-msg"></div>
                </div>
            </div>
        </div>
    </div>
</template>
@endsection

@push('scripts')
<script>
let programData = null;

function showLoader(show) {
    document.getElementById('globalLoader').style.display = show ? 'flex' : 'none';
}

function initPlanner(id) {
    if(!id) return;
    showLoader(true);
    fetch(`/branch-executive/timetable/data/${id}`)
        .then(r => r.json())
        .then(d => {
            programData = d;
            document.getElementById('plannerWrapper').classList.remove('d-none');
            document.getElementById('actionButtons').classList.remove('d-none');
            document.querySelectorAll('[id^="container-"]').forEach(c => c.innerHTML = '');
            refreshAll();
        })
        .catch(err => Swal.fire('Error', 'Failed to load program data', 'error'))
        .finally(() => showLoader(false));
}

function addSlot(day) {
    const container = document.getElementById(`container-${day}`);
    const temp = document.getElementById('slotTemplate').content.cloneNode(true);
    const card = temp.querySelector('.slot-card');
    
    // Populate Courses
    const cs = card.querySelector('.course-sel');
    cs.innerHTML = '<option value="">Select Course</option>';
    programData.courses.forEach(c => cs.innerHTML += `<option value="${c.id}">${c.course_name}</option>`);

    // Instructor Logic
    const is = card.querySelector('.instructor-sel');
    cs.onchange = () => {
        is.innerHTML = '<option value="">Select Instructor</option>';
        programData.assignments
            .filter(a => a.course_id == cs.value)
            .forEach(a => is.innerHTML += `<option value="${a.instructor_id}">${a.instructor_name}</option>`);
        refreshAll();
    };

    // Batch Logic
    const bc = card.querySelector('.batch-checks');
    programData.batches.forEach(b => {
        bc.innerHTML += `<div><input type="checkbox" class="form-check-input b-check" value="${b.id}" onchange="refreshAll()"> <span class="ms-1">${b.batch_name}</span></div>`;
    });

    container.appendChild(card);
    refreshAll();
}

function removeSlot(btn) {
    btn.closest('.slot-card').remove();
    refreshAll();
}

function refreshAll() {
    detectClashes();
    updateAnalytics();
    // Update Badge Counts
    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
        document.getElementById('count-{{ $day }}').innerText = document.querySelectorAll('#container-{{ $day }} .slot-card').length;
    @endforeach
}

function detectClashes() {
    let slots = [];
    document.querySelectorAll('.slot-card').forEach(card => {
        card.classList.remove('clash-card');
        card.querySelector('.clash-section').classList.add('d-none');
        
        const day = card.closest('.tab-pane').id.replace('tab-', '');
        const s = card.querySelector('.start-time').value;
        const e = card.querySelector('.end-time').value;
        const ins = card.querySelector('.instructor-sel').value;
        const room = card.querySelector('.classroom-input').value;
        const batches = [...card.querySelectorAll('.b-check:checked')].map(b => b.value);

        if(s && e) slots.push({ day, s, e, ins, room, batches, card });
    });

    slots.forEach((s1, i) => {
        slots.forEach((s2, j) => {
            if(i === j || s1.day !== s2.day) return;
            
            // Time overlap check
            if(s1.s < s2.e && s2.s < s1.e) {
                let error = "";
                if(s1.ins && s1.ins === s2.ins) error = "Instructor double-booked!";
                if(s1.room && s1.room === s2.room) error = "Room Conflict!";
                if(s1.batches.some(b => s2.batches.includes(b))) error = "Batch overlap!";

                if(error) {
                    s1.card.classList.add('clash-card');
                    const msg = s1.card.querySelector('.clash-msg');
                    s1.card.querySelector('.clash-section').classList.remove('d-none');
                    msg.innerText = error;
                }
            }
        });
    });
}

function updateAnalytics() {
    const map = {};
    document.querySelectorAll('.instructor-sel').forEach(sel => {
        if(sel.value) {
            const name = sel.selectedOptions[0].text;
            map[name] = (map[name] || 0) + 1;
        }
    });
    const list = document.getElementById('facultyList');
    list.innerHTML = Object.entries(map).map(([name, count]) => 
        `<li class="list-group-item d-flex justify-content-between align-items-center small">
            ${name} <span class="badge bg-info rounded-pill">${count} slots</span>
        </li>`).join('') || '<li class="list-group-item small text-muted">No assignments</li>';
}

function submitTimetable() {
    // 1. Check for UI Clashes first
    if(document.querySelectorAll('.clash-card').length > 0) {
        return Swal.fire('Clash Detected', 'Please fix the red highlighted slots.', 'warning');
    }

    const sessions = [];
    let isValid = true;

    document.querySelectorAll('.slot-card').forEach((card, index) => {
        const batches = [...card.querySelectorAll('.b-check:checked')].map(b => b.value);
        const courseId = card.querySelector('.course-sel').value;
        const startTime = card.querySelector('.start-time').value;
        const endTime = card.querySelector('.end-time').value;

        if(!courseId || !startTime || !endTime || batches.length === 0) {
            isValid = false;
            card.classList.add('border-danger');
        }

        sessions.push({
            day: card.closest('.tab-pane').id.replace('tab-', ''),
            course_id: courseId,
            instructor_id: card.querySelector('.instructor-sel').value,
            start_time: startTime,
            end_time: endTime,
            classroom: card.querySelector('.classroom-input').value,
            batch_ids: batches
        });
    });

    if(!isValid) return Swal.fire('Incomplete', 'Please fill all fields for each slot.', 'info');
    if(sessions.length === 0) return Swal.fire('Empty', 'Add at least one class.', 'info');

    showLoader(true);

    fetch(`{{ route('timeTable.store') }}`, {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json' 
        },
        body: JSON.stringify({ 
            program_id: document.getElementById('programSelect').value, 
            sessions: sessions 
        })
    })
    .then(async response => {
        const data = await response.json();
        if (!response.ok) {
            // This is where the 422 error is caught and passed to the next block
            throw new Error(data.message || 'Server Validation Error');
        }
        return data;
    })
    .then(result => {
        showLoader(false);
        Swal.fire('Success!', result.message, 'success').then(() => {
            // Optional: instead of reload, just refresh state
            location.reload(); 
        });
    })
    .catch(error => {
        showLoader(false);
        console.error('Save Error:', error);
        Swal.fire('Error 422', error.message, 'error');
    });
}
</script>
@endpush