<nav x-data="{ sidebarOpen: true }"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-gray-100 shadow-lg
    transform transition-transform duration-300 ease-in-out
    sm:translate-x-0"
    :class="{ '-translate-x-full': !sidebarOpen }">

    <!-- Logo + Close Button -->
    <div class="flex items-center justify-between px-6 py-4 border-b border-slate-700">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
            <x-application-logo class="block h-9 w-auto text-white" />
            <span class="text-lg font-semibold tracking-wide">FaithTrack</span>
        </a>

        <!-- Close (mobile only) -->
        <button @click="sidebarOpen = false" class="sm:hidden p-2 text-gray-300 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Sidebar Content -->
    <div class="flex-1 overflow-y-auto py-5">
        <!-- Main Navigation -->
        <div class="mb-8">
            <h2 class="px-6 text-xs uppercase tracking-wider text-gray-400 mb-3 font-semibold">Main</h2>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center w-full px-6 py-2.5 text-sm rounded-md transition-all
                        {{ request()->routeIs('dashboard')
                            ? 'bg-slate-800 text-white font-medium'
                            : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}">
                        🏠 <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('members.index') }}"
                        class="flex items-center w-full px-6 py-2.5 text-sm rounded-md transition-all
                        {{ request()->routeIs('members.*')
                            ? 'bg-slate-800 text-white font-medium'
                            : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}">
                        👥 <span class="ml-3">Members</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('officers.index') }}"
                        class="flex items-center w-full px-6 py-2.5 text-sm rounded-md transition-all
                        {{ request()->routeIs('officers.*')
                            ? 'bg-slate-800 text-white font-medium'
                            : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}">
                        🧑‍💼 <span class="ml-3">Officers</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Settings Section -->
        <div>
            <h2 class="px-6 text-xs uppercase tracking-wider text-gray-400 mb-3 font-semibold">Settings</h2>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center w-full px-6 py-2.5 text-sm rounded-md transition-all
                        {{ request()->routeIs('profile.edit')
                            ? 'bg-slate-800 text-white font-medium'
                            : 'text-gray-300 hover:bg-slate-800 hover:text-white' }}">
                        ⚙️ <span class="ml-3">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Logout -->
    <div class="absolute bottom-5 left-0 w-full px-6 py-4 border-t border-slate-800 bg-slate-900">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-3 w-full px-4 py-2 text-sm font-medium rounded-md text-gray-300 bg-slate-800 hover:bg-red-600 hover:text-white transition">
                🚪 <span>Log Out</span>
            </button>
        </form>
    </div>
</nav>
