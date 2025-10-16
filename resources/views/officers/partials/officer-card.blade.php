@php
    $colors = $board->getColorScheme();
@endphp

<div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow p-4 text-center max-w-xs w-full group">
    <!-- Photo/Avatar -->
    <div class="relative mb-4">
        @if ($officer->photo_path)
            <img src="{{ $officer->photo_url }}" alt="{{ $officer->full_name }}"
                class="w-32 h-32 rounded-full mx-auto object-cover border-4 {{ $colors['border'] }}">
        @else
            <div
                class="w-32 h-32 rounded-full mx-auto bg-gradient-to-br {{ $colors['gradient'] }} flex items-center justify-center text-white text-4xl font-bold border-4 {{ $colors['border'] }}">
                {{ $officer->initials }}
            </div>
        @endif

        <!-- Edit Button Overlay -->
        <div
            class="absolute inset-0 rounded-full bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all flex items-center justify-center">
            <a href="{{ route('officers.edit', $officer) }}"
                class="opacity-0 group-hover:opacity-100 transition-opacity bg-white {{ $colors['text'] }} px-3 py-2 rounded-full text-xs font-semibold flex items-center space-x-1 hover:{{ $colors['bg'] }} hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span>Edit</span>
            </a>
        </div>
    </div>

    <!-- Name -->
    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $officer->full_name }}</h3>

    <!-- Position -->
    <p class="{{ $colors['text'] }} font-semibold text-sm mb-2">
        {{ $officer->position }}
    </p>

    <!-- Department -->
    @if ($officer->department)
        <p class="text-gray-600 text-xs mb-3">{{ $officer->department }}</p>
    @endif

    <!-- Contact -->
    <div class="text-xs text-gray-500 space-y-1 mb-3 border-t pt-2">
        @if ($officer->email)
            <p class="truncate">
                <a href="mailto:{{ $officer->email }}" class="{{ $colors['text'] }} hover:underline">
                    {{ $officer->email }}
                </a>
            </p>
        @endif
        @if ($officer->contact_number)
            <p>
                <a href="tel:{{ $officer->contact_number }}" class="{{ $colors['text'] }} hover:underline">
                    {{ $officer->contact_number }}
                </a>
            </p>
        @endif
    </div>

    <!-- Status Badge -->
    <div class="flex justify-center">
        <span
            class="px-2 py-1 rounded-full text-xs font-semibold {{ $officer->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
            {{ ucfirst($officer->status) }}
        </span>
    </div>
</div>
