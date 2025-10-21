<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📊 Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- TOP SECTION: 4 Key Metrics -->
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">📊 Church Membership Overview</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Active Members -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-blue-100 hover:shadow-lg transition rounded-xl p-6 border-2 border-blue-200">
                        <h4 class="text-xs font-bold text-blue-700 uppercase tracking-wider mb-2">Active</h4>
                        <p class="text-4xl font-bold text-blue-900">{{ $activeMembersCount }}</p>
                        <p class="text-sm text-blue-700 mt-1">members</p>
                    </div>

                    <!-- Male Members -->
                    <div
                        class="bg-gradient-to-br from-indigo-50 to-indigo-100 hover:shadow-lg transition rounded-xl p-6 border-2 border-indigo-200">
                        <h4 class="text-xs font-bold text-indigo-700 uppercase tracking-wider mb-2">Male</h4>
                        <p class="text-4xl font-bold text-indigo-900">{{ $maleCount }}</p>
                        <p class="text-sm text-indigo-700 mt-1">members</p>
                    </div>

                    <!-- Female Members -->
                    <div
                        class="bg-gradient-to-br from-pink-50 to-pink-100 hover:shadow-lg transition rounded-xl p-6 border-2 border-pink-200">
                        <h4 class="text-xs font-bold text-pink-700 uppercase tracking-wider mb-2">Female</h4>
                        <p class="text-4xl font-bold text-pink-900">{{ $femaleCount }}</p>
                        <p class="text-sm text-pink-700 mt-1">members</p>
                    </div>

                    <!-- New Members YTD -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 hover:shadow-lg transition rounded-xl p-6 border-2 border-green-200">
                        <h4 class="text-xs font-bold text-green-700 uppercase tracking-wider mb-2">New</h4>
                        <p class="text-4xl font-bold text-green-900">{{ $newMembersYTD }}</p>
                        <p class="text-sm text-green-700 mt-1">YTD</p>
                    </div>

                </div>
            </div>

            <!-- MIDDLE SECTION: Age Distribution + Membership Growth -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- LEFT: Age Distribution Donut Chart -->
                <div class="bg-white shadow-lg rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Age Distribution</h3>

                    <div class="flex justify-center mb-4">
                        <canvas id="ageDistributionChart" class="max-w-[300px] max-h-[300px]"></canvas>
                    </div>

                    <!-- Legend with counts -->
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                <span class="text-gray-700">Children (0-11)</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $children }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-yellow-500 mr-2"></div>
                                <span class="text-gray-700">CYF (12-30)</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $cyf }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-purple-500 mr-2"></div>
                                <span class="text-gray-700">CYAF (31-50)</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $cyaf }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-indigo-500 mr-2"></div>
                                <span class="text-gray-700">UCM (51+ Men)</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $ucm }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-pink-500 mr-2"></div>
                                <span class="text-gray-700">CWA (51+ Women)</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $cwa }}</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Membership Growth Line Chart -->
                <div class="bg-white shadow-lg rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Membership Growth</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Trend:</span>
                            <span
                                class="text-lg font-bold {{ $growthPercentage >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $growthPercentage >= 0 ? '↗' : '↘' }} {{ abs($growthPercentage) }}%
                            </span>
                        </div>
                    </div>

                    <div>
                        <canvas id="membershipGrowthChart" class="max-h-[280px]"></canvas>
                    </div>

                    <p class="text-xs text-gray-500 mt-3 text-center">Last 6 Months</p>
                </div>

            </div>

            <!-- BOTTOM SECTION: Officers by Board + Upcoming Birthdays -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- LEFT: Officers by Board Bar Chart -->
                <div class="bg-white shadow-lg rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Officers by Board</h3>

                    <div>
                        <canvas id="officersChart" class="max-h-[300px]"></canvas>
                    </div>

                    <!-- Summary below chart -->
                    <div class="mt-4 grid grid-cols-2 gap-2 text-xs">
                        @foreach ($boardLabels as $index => $label)
                            <div class="flex items-center justify-between bg-gray-50 rounded px-3 py-2">
                                <span class="text-gray-700">{{ $label }}</span>
                                <span class="font-semibold text-gray-900">{{ $officersByBoard[$index] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- RIGHT: Upcoming Birthdays -->
                <div class="bg-white shadow-lg rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Upcoming Birthdays</h3>

                    @if ($upcomingBirthdays->isNotEmpty())
                        <ul class="space-y-3">
                            @foreach ($upcomingBirthdays as $member)
                                <li
                                    class="flex items-center justify-between p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg border border-purple-100">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($member->first_name, 0, 1)) }}{{ strtoupper(substr($member->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">
                                                {{ $member->first_name }} {{ $member->last_name }}
                                            </p>
                                            <p class="text-xs text-gray-600">
                                                {{ Carbon\Carbon::parse($member->birthdate)->format('M d') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-purple-700">
                                            {{ $member->days_until == 0 ? 'Today!' : ($member->days_until == 1 ? 'Tomorrow' : $member->days_until . 'd') }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-100 text-center">
                            <p class="text-sm text-blue-800">
                                <span class="font-bold">{{ $birthdaysThisMonth }}</span>
                                birthday{{ $birthdaysThisMonth != 1 ? 's' : '' }} this month
                            </p>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-500 mt-3">No upcoming birthdays in the next 30 days</p>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Age Distribution Donut Chart
        const ageCtx = document.getElementById('ageDistributionChart');
        new Chart(ageCtx, {
            type: 'doughnut',
            data: {
                labels: ['Children (0-11)', 'CYF (12-30)', 'CYAF (31-50)', 'UCM (51+ Men)', 'CWA (51+ Women)'],
                datasets: [{
                    data: [{{ $children }}, {{ $cyf }}, {{ $cyaf }},
                        {{ $ucm }}, {{ $cwa }}
                    ],
                    backgroundColor: ['#10b981', '#eab308', '#a855f7', '#6366f1', '#ec4899'],
                    borderColor: '#ffffff',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed / total) * 100).toFixed(1);
                                return `${context.label}: ${context.parsed} (${percentage}%)`;
                            }
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value, context) => {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return value > 0 ? `${percentage}%` : '';
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Membership Growth Line Chart
        const growthCtx = document.getElementById('membershipGrowthChart');
        new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($growthLabels) !!},
                datasets: [{
                    label: 'Total Members',
                    data: {!! json_encode($growthData) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#fff',
                        bodyColor: '#fff'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Officers by Board Bar Chart
        const officersCtx = document.getElementById('officersChart');
        new Chart(officersCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($boardLabels) !!},
                datasets: [{
                    label: 'Officers',
                    data: {!! json_encode($officersByBoard) !!},
                    backgroundColor: ['#6366f1', '#f59e0b', '#06b6d4', '#10b981', '#ef4444', '#a855f7'],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1f2937'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
