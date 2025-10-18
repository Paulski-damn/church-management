<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Church Officers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ✅ Success Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Selected Board Section --}}
            @if ($selectedBoard)
                @php
                    $selectedColors = $selectedBoard->getColorScheme();
                @endphp

                <div class="bg-white rounded-lg p-6">

                    {{-- Filter + Add Officer --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                        {{-- Filter --}}
                        <div class="flex items-center gap-2">
                            <label for="boardFilter" class="text-sm font-semibold text-gray-700">Filter by Board:</label>
                            <select id="boardFilter" onchange="location = this.value;"
                                class="block w-64 rounded-md border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800 text-sm">
                                <option value="{{ route('officers.index') }}">Select Board</option>
                                @foreach ($boards as $board)
                                    <option value="{{ route('officers.index', ['board_id' => $board->id]) }}"
                                        {{ $selectedBoard?->id === $board->id ? 'selected' : '' }}>
                                        {{ $board->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Add Officer Button --}}
                        <a href="{{ route('officers.create', ['board_id' => $selectedBoard->id]) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded-md hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Add Officer
                        </a>
                    </div>

                    {{-- Board Info --}}
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $selectedBoard->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ $selectedBoard->description }}</p>
                        <p class="text-sm text-gray-500">
                            Total Officers: <span class="font-bold">{{ $officers->count() }}</span>
                        </p>
                    </div>

                    {{-- Officers List --}}
                    @if ($officers->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($officers as $officer)
                                @include('officers.partials.officer-card-filter', [
                                    'officer' => $officer,
                                    'board' => $selectedBoard,
                                ])
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 text-gray-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20a9 9 0 0118 0" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No officers yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by adding the first officer to this board.
                            </p>
                        </div>
                    @endif

                </div>
            @else
                {{-- No Board Selected --}}
                <div class="text-center py-12 bg-white rounded-lg shadow">
                    <p class="text-gray-500">Please select a board to view officers</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
