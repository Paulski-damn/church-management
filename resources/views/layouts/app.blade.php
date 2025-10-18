<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FaithTrack') }}</title>

    <link rel="icon" href="{{ asset('images/FaithTrack.png') }}" type="image/png" sizes="32x32">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">
        <!-- Overlay for mobile -->
        <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
            class="fixed inset-0 bg-black/50 z-40 sm:hidden"></div>

        <!-- Sidebar -->
        @include('layouts.navigation')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen transition-all duration-300 sm:ml-64">
            <!-- Top bar -->
            <header
                class="bg-white shadow flex justify-between items-center px-6 py-3 sticky top-0 z-30 border-b border-gray-200">
                <!-- Hamburger (mobile only) -->
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-md text-gray-600 hover:bg-gray-200 transition sm:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 5.75h16.5M3.75 12h16.5m-16.5 6.25h16.5" />
                    </svg>
                </button>

                <!-- Page Header -->
                @isset($header)
                    <div class="font-semibold text-lg text-gray-800">
                        {{ $header }}
                    </div>
                @endisset

                <!-- Profile Dropdown -->
                <div class="flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-100 focus:outline-none">
                                <div class="mr-2">{{ Auth::user()->name }}</div>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

            <x-footer />
        </div>
    </div>
</body>

</html>
