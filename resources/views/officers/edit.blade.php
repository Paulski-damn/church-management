<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Officer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('officers.update', $officer) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Board Selection -->
                            <div class="md:col-span-2">
                                <label for="board_id" class="block font-medium text-sm text-gray-700 mb-2">Select
                                    Board/Department *</label>
                                <select id="board_id" name="board_id"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                    @foreach ($boards as $board)
                                        <option value="{{ $board->id }}"
                                            {{ old('board_id', $officer->board_id) == $board->id ? 'selected' : '' }}>
                                            {{ $board->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('board_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block font-medium text-sm text-gray-700">First Name
                                    *</label>
                                <input id="first_name" type="text" name="first_name"
                                    value="{{ old('first_name', $officer->first_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                @error('first_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block font-medium text-sm text-gray-700">Last Name
                                    *</label>
                                <input id="last_name" type="text" name="last_name"
                                    value="{{ old('last_name', $officer->last_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                @error('last_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Middle Name -->
                            <div>
                                <label for="middle_name" class="block font-medium text-sm text-gray-700">Middle
                                    Name</label>
                                <input id="middle_name" type="text" name="middle_name"
                                    value="{{ old('middle_name', $officer->middle_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('middle_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Position -->
                            <div>
                                <label for="position" class="block font-medium text-sm text-gray-700">Position *</label>
                                <select id="position" name="position"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position }}"
                                            {{ old('position', $officer->position) == $position ? 'selected' : '' }}>
                                            {{ $position }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('position')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Hierarchy Level -->
                            <div>
                                <label for="hierarchy_level" class="block font-medium text-sm text-gray-700">Hierarchy
                                    Level *</label>
                                <select id="hierarchy_level" name="hierarchy_level"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                                    @foreach ($hierarchyLevels as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ old('hierarchy_level', $officer->hierarchy_level) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('hierarchy_level')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                <input id="email" type="email" name="email"
                                    value="{{ old('email', $officer->email) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contact Number -->
                            <div>
                                <label for="contact_number" class="block font-medium text-sm text-gray-700">Contact
                                    Number</label>
                                <input id="contact_number" type="text" name="contact_number"
                                    value="{{ old('contact_number', $officer->contact_number) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('contact_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Term Start -->
                            <div>
                                <label for="term_start" class="block font-medium text-sm text-gray-700">Term
                                    Start</label>
                                <input id="term_start" type="date" name="term_start"
                                    value="{{ old('term_start', $officer->term_start?->format('Y-m-d')) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('term_start')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Term End -->
                            <div>
                                <label for="term_end" class="block font-medium text-sm text-gray-700">Term End</label>
                                <input id="term_end" type="date" name="term_end"
                                    value="{{ old('term_end', $officer->term_end?->format('Y-m-d')) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('term_end')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Display Order -->
                            <div>
                                <label for="order" class="block font-medium text-sm text-gray-700">Display
                                    Order</label>
                                <input id="order" type="number" name="order"
                                    value="{{ old('order', $officer->order) }}" min="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('order')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                                <select id="status" name="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="active"
                                        {{ old('status', $officer->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $officer->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Photo -->
                            <div class="md:col-span-2">
                                <label for="photo" class="block font-medium text-sm text-gray-700">Photo</label>

                                @if ($officer->photo_path)
                                    <div class="mb-3">
                                        <p class="text-sm text-gray-600 mb-2">Current Photo:</p>
                                        <img src="{{ $officer->photo_url }}" alt="{{ $officer->full_name }}"
                                            class="w-32 h-32 rounded-lg object-cover">
                                    </div>
                                @endif

                                <input id="photo" type="file" name="photo" accept="image/*"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="text-gray-500 text-xs mt-1">Max 2MB. Formats: JPEG, PNG, JPG, GIF (leave
                                    empty to keep current photo)</p>
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Bio -->
                            <div class="md:col-span-2">
                                <label for="bio" class="block font-medium text-sm text-gray-700">Bio</label>
                                <textarea id="bio" name="bio" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('bio', $officer->bio) }}</textarea>
                                <p class="text-gray-500 text-xs mt-1">Max 1000 characters</p>
                                @error('bio')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-4">
                            <a href="{{ route('officers.index', ['board_id' => $officer->board_id]) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                Update Officer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
