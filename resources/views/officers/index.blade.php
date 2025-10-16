<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Church Officers') }}
            </h2>
            @if ($selectedBoard)
                <a href="{{ route('officers.create', ['board_id' => $selectedBoard->id]) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded-md uppercase tracking-widest hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Officer
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filter Section -->
            <div class="bg-white rounded-md shadow-sm p-4 mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    {{ __('Filter by Department/Board') }}
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                    @forelse ($boards as $board)
                        @php
                            $colors = $board->getColorScheme();
                        @endphp

                        <a href="{{ route('officers.index', ['board_id' => $board->id]) }}"
                            class="flex items-center gap-2 px-3 py-2 border rounded-md text-sm transition
               {{ $selectedBoard?->id === $board->id
                   ? $colors['border'] . ' bg-' . $board->color . '-50 font-semibold'
                   : 'border-gray-200 bg-white hover:bg-gray-50 hover:border-gray-300' }}">
                            <div class="w-3 h-3 rounded-full {{ $colors['bg'] }}"></div>
                            <div class="flex-1 truncate">{{ $board->name }}</div>
                            @if ($selectedBoard?->id === $board->id)
                                <svg class="w-4 h-4 {{ $colors['text'] }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                        </a>
                    @empty
                        <p class="text-gray-500 col-span-3">No boards available</p>
                    @endforelse
                </div>
            </div>


            @if ($selectedBoard)
                @php
                    $selectedColors = $selectedBoard->getColorScheme();
                @endphp

                <!-- Board Info Card -->
                <div
                    class="bg-gradient-to-r {{ $selectedColors['gradient'] }} rounded-lg shadow-lg p-8 mb-8 text-white">
                    <h2 class="text-3xl font-bold mb-2">{{ $selectedBoard->name }}</h2>
                    <p class="text-opacity-90 mb-4">{{ $selectedBoard->description }}</p>
                    <p class="text-sm opacity-75">
                        Total Officers: <span class="font-bold text-lg">{{ $officers->count() }}</span>
                    </p>
                </div>

                <!-- Officers List -->
                <div class="bg-white rounded-lg shadow-lg p-8">
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
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20a9 9 0 0118 0" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No officers yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by adding the first officer to this board.
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('officers.create', ['board_id' => $selectedBoard->id]) }}"
                                    class="inline-flex items-center px-4 py-2 {{ $selectedColors['bg'] }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90">
                                    Add Officer
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-lg shadow">
                    <p class="text-gray-500">Please select a board to view officers</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
