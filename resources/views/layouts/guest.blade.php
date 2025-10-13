<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased min-h-screen flex bg-gray-50">

    <!-- Left Side Branding / Image -->
    <div class="hidden lg:flex lg:w-2/3 flex-col justify-center px-20">
        <h2 class="text-6xl font-extrabold text-Tgradient-to-br from-slate-800 via-slate-700 to-slate-900 mb-4 ml-11 ">
            FaithTrack</h2>
        <p class="max-w-xl mt-4 ml-11 text-gray-700 text-xl leading-relaxed">
            Manage your church records, track members, and view ministry data — all in one place.
        </p>
    </div>

    <!-- Right Side Login Form -->
    <div class="flex items-center justify-center mr-20 w-full lg:w-1/3 px-6">
        <div
            class="animate-slide-fade w-full max-w-md bg-white rounded-2xl shadow-lg p-8 flex flex-col justify-center border border-gray-200">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
