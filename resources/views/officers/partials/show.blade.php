<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('🎖 Officer Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

                <!-- Header Section -->
                <div
                    class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 p-6 text-white flex items-center space-x-6">
                    @if ($officer->photo)
                        <img src="{{ asset('storage/' . $officer->photo) }}" alt="{{ $officer->first_name }}"
                            class="w-24 h-24 object-cover rounded-full border-2 border-gray-200 shadow-md">
                    @else
                        <div
                            class="w-24 h-24 flex items-center justify-center bg-gray-600 rounded-full text-3xl font-bold">
                            {{ strtoupper(substr($officer->first_name, 0, 1)) }}
                        </div>
                    @endif

                    <div>
                        <h3 class="text-3xl font-bold mb-1">
                            {{ $officer->first_name }} {{ $officer->middle_name }} {{ $officer->last_name }}
                        </h3>
                        <p class="text-gray-300 text-sm mb-3">{{ $officer->position }}</p>

                        <div class="flex flex-wrap gap-3">
                            <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-800 text-sm font-medium">
                                {{ $officer->board->name ?? 'No Board Assigned' }}
                            </span>
                            <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-sm font-medium">
                                {{ $officer->hierarchy_level }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-8 space-y-10">

                    <!-- Officer Information -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                            🧾 Officer Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ([
        'Board/Department' => $officer->board->name ?? 'N/A',
        'Position' => $officer->position,
        'Hierarchy Level' => ucfirst($officer->hierarchy_level),
        'Display Order' => $officer->order,
    ] as $label => $value)
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-500 mb-1">{{ $label }}</label>
                                    <p class="text-lg text-gray-900">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                            ☎️ Contact Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                                <p class="text-lg text-gray-900">{{ $officer->email ?: 'N/A' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Contact Number</label>
                                <p class="text-lg text-gray-900">{{ $officer->contact_number ?: 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Term Details -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                            📅 Term Duration
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Term Start</label>
                                <p class="text-lg text-gray-900">
                                    {{ $officer->term_start ? \Carbon\Carbon::parse($officer->term_start)->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Term End</label>
                                <p class="text-lg text-gray-900">
                                    {{ $officer->term_end ? \Carbon\Carbon::parse($officer->term_end)->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bio Section -->
                    @if ($officer->bio)
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                🧠 Biography
                            </h4>
                            <p class="text-gray-900 leading-relaxed whitespace-pre-line">{{ $officer->bio }}</p>
                        </div>
                    @endif

                    <!-- Record Info -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                            🗂 Record Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Created On</label>
                                <p class="text-lg text-gray-900">{{ $officer->created_at->format('F d, Y h:i A') }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                                <p class="text-lg text-gray-900">{{ $officer->updated_at->format('F d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('officers.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back
                        </a>

                        <a href="{{ route('officers.edit', $officer) }}"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white text-sm font-medium rounded-lg hover:opacity-90 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        <form id="deleteForm-{{ $officer->id }}" action="{{ route('officers.destroy', $officer) }}"
                            method="POST" onsubmit="return confirm('Delete this officer?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="openModal('deleteModal-{{ $officer->id }}')"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
