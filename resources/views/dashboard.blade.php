<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Analytics Summary -->
            <div class="bg-white shadow-sm rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Church Membership Analytics</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Active Members -->
                    <div class="bg-blue-50 hover:bg-blue-100 transition rounded-xl p-6 border border-blue-100">
                        <h4 class="text-sm font-semibold text-blue-800 uppercase tracking-wide">Active Members</h4>
                        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $activeMembersCount }}</p>
                    </div>

                    <!-- Children -->
                    <div class="bg-green-50 hover:bg-green-100 transition rounded-xl p-6 border border-green-100">
                        <h4 class="text-sm font-semibold text-green-800 uppercase tracking-wide">Children (0–11 yrs)
                        </h4>
                        <p class="text-4xl font-bold text-green-900 mt-2">{{ $children }}</p>
                    </div>

                    <!-- CYF -->
                    <div class="bg-yellow-50 hover:bg-yellow-100 transition rounded-xl p-6 border border-yellow-100">
                        <h4 class="text-sm font-semibold text-yellow-800 uppercase tracking-wide">CYF (12–30 yrs)</h4>
                        <p class="text-4xl font-bold text-yellow-900 mt-2">{{ $cyf }}</p>
                    </div>

                    <!-- CYAF -->
                    <div class="bg-purple-50 hover:bg-purple-100 transition rounded-xl p-6 border border-purple-100">
                        <h4 class="text-sm font-semibold text-purple-800 uppercase tracking-wide">CYAF (31–50 yrs)</h4>
                        <p class="text-4xl font-bold text-purple-900 mt-2">{{ $cyaf }}</p>
                    </div>

                    <!-- UCM -->
                    <div class="bg-indigo-50 hover:bg-indigo-100 transition rounded-xl p-6 border border-indigo-100">
                        <h4 class="text-sm font-semibold text-indigo-800 uppercase tracking-wide">UCM (51+ Men)</h4>
                        <p class="text-4xl font-bold text-indigo-900 mt-2">{{ $ucm }}</p>
                    </div>

                    <!-- CWA -->
                    <div class="bg-pink-50 hover:bg-pink-100 transition rounded-xl p-6 border border-pink-100">
                        <h4 class="text-sm font-semibold text-pink-800 uppercase tracking-wide">CWA (51+ Women)</h4>
                        <p class="text-4xl font-bold text-pink-900 mt-2">{{ $cwa }}</p>
                    </div>
                </div>
            </div>

            <!-- Combined Charts and Recent Members -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- LEFT SIDE: Pie Chart-->
                <div class="bg-white shadow-sm rounded-2xl p-6 space-y-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Visual Statistics</h3>

                    <!-- Pie Chart -->
                    <div
                        class="bg-gray-50 border border-gray-100 rounded-xl shadow-inner p-5 hover:shadow-md transition">
                        <h4 class="text-base font-semibold mb-3 text-gray-700 text-center">Gender Distribution</h4>
                        <div class="flex justify-center">
                            <canvas id="genderPieChart" class="w-full max-w-[400px] h-[220px]"></canvas>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE: Recent Members -->
                <div class="bg-white shadow-sm rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold">Recently Added Members</h3>
                        <a href="{{ route('members.index') }}"
                            class="px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded-md shadow hover:bg-gray-700 transition">
                            View All
                        </a>
                    </div>

                    @if ($recentActivities->isNotEmpty())
                        <ul class="space-y-3">
                            @foreach ($recentActivities as $activity)
                                <li
                                    class="flex items-start gap-3 p-3 rounded-lg border border-gray-100 bg-gray-50 hover:bg-gray-100 transition">
                                    <div class="w-3 h-3 mt-2 rounded-full bg-green-500"></div>

                                    <div>
                                        <p class="text-gray-800 font-medium">
                                            {{ $activity->first_name }}
                                            {{ $activity->middle_name ? $activity->middle_name[0] . '.' : '' }}
                                            {{ $activity->last_name }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Added
                                            <span class="font-medium text-gray-700">
                                                {{ $activity->created_at->diffForHumans() }}
                                            </span>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm">No recently added members found.</p>
                    @endif
                </div>
            </div>
            <!-- Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // PIE CHART — GENDER DISTRIBUTION
                const ctxGender = document.getElementById('genderPieChart');
                new Chart(ctxGender, {
                    type: 'bar',
                    data: {
                        labels: ['Male', 'Female'],
                        datasets: [{
                            label: 'Gender Distribution',
                            data: [{{ \App\Models\Member::where('gender', 'Male')->count() }},
                                {{ \App\Models\Member::where('gender', 'Female')->count() }}
                            ],
                            backgroundColor: ['#60a5fa', '#f9a8d4'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                backgroundColor: '#1f2937',
                                bodyFont: {
                                    size: 13
                                },
                                titleFont: {
                                    size: 14
                                }
                            }
                        }
                    }
                });
            </script>
</x-app-layout>
