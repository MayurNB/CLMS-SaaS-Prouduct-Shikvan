<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $branding['name'] ?? 'Your Institution' }}</title>
    <!-- Tailwind CSS CDN - Always load this for Tailwind classes to work -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter for a modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom font-family for Inter */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="flex w-full h-screen md:max-h-[800px] max-w-7xl mx-auto my-auto shadow-xl rounded-lg overflow-hidden md:flex-row flex-col" style="overflow-y: scroll;">
        <!-- Left Section (40% width on medium screens and up, full width on mobile) -->
        <div class="w-full md:w-2/5 flex flex-col items-center justify-between p-8 bg-white rounded-t-lg md:rounded-l-lg md:rounded-tr-none md:rounded-br-none">
            <!-- Top Content: Logo and Institution Name -->
            <div class="flex flex-col items-center mb-auto pt-5"> <!-- mb-auto to push content down from top slightly -->
                <img class="w-28 h-auto mb-6 rounded-lg shadow-md"
                     src="{{ $branding['logo_url'] ?? 'Your Institution Logo' }}"
                     alt="Logo">
                <h1 class="text-1xl font-extrabold text-gray-800 text-center mb-8">{{ $branding['name'] ?? 'Your Institution Name' }}</h1>
            </div>

            <!-- Middle Content: Login Form -->

            <div class="w-full max-w-xs flex flex-col items-center space-y-4 px-4">
                <form method="POST" action="{{ route('login.submit') }}">
    @csrf
                <input type="text"
                       name="username"
                       class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm text-base"
                       placeholder="Username or Email Address"
                       required>
                <input type="password"
                       name="password"
                       class="w-full p-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm text-base"
                       placeholder="Password"
                       required>
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg shadow-md transition ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 text-lg">
                    Login
                </button>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium mt-2">Forgot Password?</a>
                </form>
            </div>

            @if($errors->any())
    <div>{{ $errors->first() }}</div>
@endif

            <!-- Bottom Content: Footer -->
            <div class="mt-auto pt-10 text-center text-gray-500 text-xs w-full"> <!-- mt-auto pushes it to the bottom -->
                <a href="#" class="text-blue-600 hover:underline mx-2">Privacy Policy</a> |
                <a href="#" class="text-blue-600 hover:underline mx-2">Terms of Use</a> |
                <a href="https://yourwebsite.com" class="text-blue-600 hover:underline mx-2">Powered by Me</a>
            </div>
        </div>

        <!-- Right Section (60% width on medium screens and up, full width on mobile) -->
        <div class="w-full md:w-3/5 bg-gray-200 rounded-b-lg md:rounded-r-lg md:rounded-bl-none overflow-hidden flex items-center justify-center">
            <img class="w-full h-full object-cover"
                 src="{{ $branding['background_image_url'] ?? 'Your Institution BackgroundImage' }}"
                 alt="Background Image">
        </div>
    </div>

</body>
</html>
