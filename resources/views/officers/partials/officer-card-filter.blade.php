<div class="bg-white border-2 border-gray-200 rounded-lg shadow-md hover:shadow-xl transition-all p-6 text-center group">
    <!-- Photo/Avatar -->
    <div class="relative mb-4">
        @if ($officer->photo_path)
            <img src="{{ $officer->photo_url }}" alt="{{ $officer->full_name }}"
                class="w-24 h-24 rounded-full mx-auto object-cover border-4 {{ 'border-' . $board->color . '-500' }}">
        @else
            <div
                class="w-24 h-24 rounded-full mx-auto bg-gradient-to-br {{ 'from-' . $board->color . '-500 to-' . $board->color . '-600' }} flex items-center justify-center text-white text-3xl font-bold border-4 {{ 'border-' . $board->color . '-500' }}">
                {{ $officer->initials }}
            </div>
        @endif

        <!-- Edit Button Overlay -->
        <div
            class="absolute inset-0 rounded-full bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all flex items-center justify-center">
            <div class="opacity-0 group-hover:opacity-100 transition-opacity flex space-x-2">
                {{-- View Button --}}
                <a href="{{ route('officers.show', $officer) }}"
                    class="bg-white text-gray-700 p-2 rounded-full hover:bg-gray-800 hover:text-white transition"
                    title="View">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>

                {{-- Edit Button --}}
                <a href="{{ route('officers.edit', $officer) }}"
                    class="bg-white text-{{ $board->color }}-600 p-2 rounded-full hover:bg-{{ $board->color }}-600 hover:text-white transition"
                    title="Edit">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>

                {{-- Delete Button --}}
                <form id="deleteForm"method="POST" action="{{ route('officers.destroy', $officer) }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="openModal('deleteMemberModal')"
                        class="bg-white text-red-600 p-2 rounded-full hover:bg-red-600 hover:text-white transition"
                        onclick="return confirm('Delete this officer?')" title="Delete">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div>

    <!-- Name -->
    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $officer->full_name }}</h3>

    <!-- Position -->
    <p class="{{ 'text-' . $board->color . '-600' }} font-semibold text-sm mb-3">
        {{ $officer->position }}
    </p>

    <!-- Contact Info -->
    <div class="text-xs text-gray-600 space-y-1 mb-3 pb-3 border-b border-gray-200">
        @if ($officer->email)
            <p class="truncate">
                <a href="mailto:{{ $officer->email }}" class="{{ 'text-' . $board->color . '-600' }} hover:underline">
                    {{ $officer->email }}
                </a>
            </p>
        @endif
        @if ($officer->contact_number)
            <p>
                <a href="tel:{{ $officer->contact_number }}"
                    class="{{ 'text-' . $board->color . '-600' }} hover:underline">
                    {{ $officer->contact_number }}
                </a>
            </p>
        @endif
    </div>

    <!-- Bio -->
    @if ($officer->bio)
        <p class="text-xs text-gray-600 mb-3 line-clamp-2">{{ $officer->bio }}</p>
    @endif

    <!-- Status Badge -->
    <div class="flex justify-center">
        <span
            class="px-2 py-1 rounded-full text-xs font-semibold
            {{ $officer->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
            {{ ucfirst($officer->status) }}
        </span>
    </div>
</div>
<x-confirmation-modal id="deleteMemberModal" title="Delete Member?"
    message="Are you sure you want to delete {{ $officer->first_name }} {{ $officer->last_name }}? This action cannot be undone."
    confirmAction="document.getElementById('deleteForm').submit()" />
