<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $branding['name'] ?? 'Your Institution' }}</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Inter', sans-serif; }
    body.modal-open { overflow: hidden; }
    .role-card:hover { transform: scale(1.05); transition: transform 0.2s; }
    .role-card.active { border-color: #2563eb; box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3); }
</style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="flex w-full h-screen md:max-h-[800px] max-w-7xl mx-auto shadow-xl rounded-lg overflow-hidden md:flex-row flex-col">

    <!-- Left Section: Login Form -->
    <div class="w-full md:w-2/5 flex flex-col items-center justify-between p-8 bg-white rounded-t-lg md:rounded-l-lg">
        <div class="flex flex-col items-center mb-auto pt-5">
            <img class="w-28 h-auto mb-6 rounded-lg shadow-md"
                 src="{{ $branding['logo_url'] ?? '/images/logo.png' }}" alt="Logo">
            <h1 class="text-xl font-extrabold text-gray-800 text-center mb-8">
                {{ $branding['name'] ?? 'Your Institution Name' }}
            </h1>
        </div>

        <div class="w-full max-w-xs flex flex-col items-center space-y-4 px-4">
            <form id="loginForm" method="POST" action="{{ route('login.submit') }}">
                @csrf
                <input type="text" name="username"
                       class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm text-base"
                       placeholder="Username" required>
                <input type="password" name="password"
                       class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm text-base mt-3"
                       placeholder="Password" required>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg shadow-md mt-4 text-lg">
                    Login
                </button>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium mt-2 inline-block">Forgot Password?</a>
            </form>

            @if($errors->any())
                <div class="text-red-500 text-sm mt-2 text-center">{{ $errors->first() }}</div>
            @endif
        </div>

        <div class="mt-auto pt-10 text-center text-gray-500 text-xs w-full">
            <a href="#" class="text-blue-600 hover:underline mx-2">Privacy Policy</a> |
            <a href="#" class="text-blue-600 hover:underline mx-2">Terms of Use</a> |
            <a href="https://mnbsolutions.vercel.app/" class="text-blue-600 hover:underline mx-2">Powered by MNBSolutions</a>
        </div>
        <div>
         <button id="installAppBtn"
        style="
        display:none;
        position:fixed;
        bottom:20px;
        right:20px;
        z-index:9999;
        padding:12px 18px;">
    📱 Install App
</button>
        </div>
        
    </div>

    <!-- Right Section: Background Image -->
    <div class="w-full md:w-3/5 bg-gray-200 overflow-hidden flex items-center justify-center rounded-b-lg md:rounded-r-lg">
        <img class="w-full h-full object-cover"
             src="{{ $branding['background_image_url'] ?? '/images/bg.jpg' }}"
             alt="Background Image">
    </div>
</div>

<!-- Role Selection Modal -->
@if(session('combinedRoles'))
<div id="roleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Select Your Role / Access</h2>
        <form method="POST" action="{{ route('selectBranchRole') }}" id="roleForm">
            @csrf
            <input type="hidden" name="role_id" id="selectedRoleId">
            <input type="hidden" name="role_type" id="selectedRoleType">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach(session('combinedRoles') as $r)
                <div class="role-card cursor-pointer border border-gray-300 rounded-lg p-4 flex flex-col justify-center items-center text-center"
                     data-id="{{ $r['id'] }}" data-type="{{ $r['type'] }}">
                    <p class="text-lg font-semibold text-gray-800">{{ ucfirst($r['type']) }}</p>
                    <p class="text-gray-600">{{ $r['name'] }}</p>
                    @if($r['branch'])
                        <p class="text-gray-500 text-sm">({{ $r['branch'] }})</p>
                    @endif
                </div>
                @endforeach
            </div>

            <button type="submit"
                    class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg">
                Continue
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('modal-open');

    const roleCards = document.querySelectorAll('.role-card');
    const selectedRoleId = document.getElementById('selectedRoleId');
    const selectedRoleType = document.getElementById('selectedRoleType');

    roleCards.forEach(card => {
        card.addEventListener('click', () => {
            // Remove active from all
            roleCards.forEach(c => c.classList.remove('active'));
            // Add active style
            card.classList.add('active');
            // Set hidden inputs
            selectedRoleId.value = card.dataset.id;
            selectedRoleType.value = card.dataset.type;
        });
    });

    // Auto-select first role if only one
    if(roleCards.length === 1) {
        roleCards[0].click();
    }
});
</script>
@endif

<script>
let deferredPrompt = null;

// Register Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('/sw.js');
    });
}

// Detect install prompt
window.addEventListener('beforeinstallprompt', function (e) {
    e.preventDefault();
    deferredPrompt = e;

    const btn = document.getElementById('installAppBtn');
    if (btn) btn.style.display = 'block';
});

// Handle install click
document.getElementById('installAppBtn').addEventListener('click', async function () {
    if (!deferredPrompt) return;

    deferredPrompt.prompt();
    await deferredPrompt.userChoice;

    deferredPrompt = null;
    this.style.display = 'none';
});
</script>

</body>
</html>

