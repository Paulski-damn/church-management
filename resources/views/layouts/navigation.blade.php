<nav x-data="{ open: false }"
    class="backdrop-blur-md bg-gradient-to-br from-slate-800/90 via-slate-700/90 to-slate-900/90 border-b border-slate-700 text-white shadow-lg">
    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left Section -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <x-application-logo
                        class="block h-10 w-auto fill-current text-white transition-transform duration-300 hover:scale-105" />
                    <span class="text-xl font-bold tracking-wide hidden sm:block">FaithTrack</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-6 text-sm font-medium">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="relative text-gray-300 hover:text-white transition duration-200 after:content-[''] after:absolute after:bottom-[-6px] after:left-0 after:w-0 after:h-[2px] after:bg-white hover:after:w-full after:transition-all after:duration-300">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')"
                        class="relative text-gray-300 hover:text-white transition duration-200 after:content-[''] after:absolute after:bottom-[-6px] after:left-0 after:w-0 after:h-[2px] after:bg-white hover:after:w-full after:transition-all after:duration-300">
                        {{ __('Members') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Section: Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-slate-600 text-sm font-medium rounded-lg text-gray-200 bg-slate-700/60 hover:bg-slate-600/80 hover:text-white focus:outline-none focus:ring focus:ring-slate-500/40 transition-all duration-200 ease-in-out">
                            <div class="mr-2">{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4 transform transition-transform duration-200 group-hover:rotate-180"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
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

            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-300 hover:text-white hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden bg-slate-800/95 border-t border-slate-700 transition-all duration-300 ease-in-out">
        <div class="pt-3 pb-4 space-y-1 text-sm">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="block text-gray-300 hover:text-white transition">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')"
                class="block text-gray-300 hover:text-white transition">
                {{ __('Members') }}
            </x-responsive-nav-link>
        </div>

        <!-- User Info -->
        <div class="pt-4 pb-3 border-t border-slate-700">
            <div class="px-4">
                <div class="font-semibold text-white text-base">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 text-sm">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-300 hover:text-white transition">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-gray-300 hover:text-white transition">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
