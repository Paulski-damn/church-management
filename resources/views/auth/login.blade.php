<x-guest-layout>
    <!-- Logo & Welcome -->
    <div class="text-center mb-6">
        <img src="{{ asset('images/faithlogo.jpg') }}" alt="Church Logo"
            class="mx-auto mb-4 w-20 h-20 rounded-full shadow-md object-cover border border-gray-200 bg-white">
        <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
        <p class="text-gray-600 text-sm mt-1">Sign in to continue to your dashboard</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="flex items-center justify-between mb-5">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 bg-white text-indigo-500 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-700">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <x-primary-button
            class="w-full justify-center bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 focus:ring-4 focus:ring-indigo-500 text-white font-semibold py-2.5 rounded-lg transition">
            {{ __('Log in') }}
        </x-primary-button>

    </form>

    <!-- Footer -->
    <div class="text-center mt-5 text-sm text-gray-500">
        &copy; {{ date('Y') }} FaithTrack. All rights reserved.
    </div>
</x-guest-layout>
