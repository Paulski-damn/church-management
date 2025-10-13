<footer class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Church Information -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Church Information</h3>
                <p class="text-gray-300 text-sm mb-2">
                    <strong>United Church Of Christ in the Philippines</strong><br>
                    Poblacion 4<br>
                    Magallanes, Cavite, 4113
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white text-sm transition">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('members.index') }}" class="text-gray-300 hover:text-white text-sm transition">
                            Members Directory
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('members.create') }}"
                            class="text-gray-300 hover:text-white text-sm transition">
                            Add New Member
                        </a>
                    </li>
                </ul>
            </div>

            <!-- About System -->
            <div>
                <h3 class="text-lg font-semibold mb-4">About System</h3>
                <p class="text-gray-300 text-sm mb-4">
                    FaithTrack helps you organize and manage your church members efficiently.
                </p>
                {{-- <div class="flex space-x-4">
                    <!-- Social Media Icons (optional) -->
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div> --}}
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white mt-8 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} FaithTrack. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
