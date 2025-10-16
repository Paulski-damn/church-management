<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                ✏️ {{ __('Edit Officer Information') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

                <!-- Header -->
                <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 p-6">
                    <h3 class="text-2xl font-bold text-white">
                        Editing: {{ $officer->first_name }} {{ $officer->last_name }}
                    </h3>
                    <p class="text-indigo-100 text-sm mt-1">
                        Update the officer’s information, position, and board details below.
                    </p>
                </div>

                <!-- Form -->
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('officers.update', $officer) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-10">

                            <!-- Personal Information -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    🧾 Personal Information
                                </h4>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="first_name" value="First Name *" />
                                        <x-text-input id="first_name" name="first_name" type="text"
                                            value="{{ old('first_name', $officer->first_name) }}" class="w-full mt-1"
                                            required />
                                        <x-input-error :messages="$errors->get('first_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="middle_name" value="Middle Name" />
                                        <x-text-input id="middle_name" name="middle_name" type="text"
                                            value="{{ old('middle_name', $officer->middle_name) }}"
                                            class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('middle_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="last_name" value="Last Name *" />
                                        <x-text-input id="last_name" name="last_name" type="text"
                                            value="{{ old('last_name', $officer->last_name) }}" class="w-full mt-1"
                                            required />
                                        <x-input-error :messages="$errors->get('last_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="email" value="Email" />
                                        <x-text-input id="email" name="email" type="email"
                                            value="{{ old('email', $officer->email) }}" class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('email')" />
                                    </div>

                                    <div>
                                        <x-input-label for="contact_number" value="Contact Number" />
                                        <x-text-input id="contact_number" name="contact_number" type="text"
                                            value="{{ old('contact_number', $officer->contact_number) }}"
                                            class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('contact_number')" />
                                    </div>
                                </div>
                            </div>

                            <!-- Board & Position -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    🧭 Board and Position
                                </h4>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="board_id" value="Board/Department *" />
                                        <select id="board_id" name="board_id"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            required>
                                            @foreach ($boards as $board)
                                                <option value="{{ $board->id }}"
                                                    {{ old('board_id', $officer->board_id) == $board->id ? 'selected' : '' }}>
                                                    {{ $board->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('board_id')" />
                                    </div>

                                    <div>
                                        <x-input-label for="position" value="Position *" />
                                        <select id="position" name="position"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            required>
                                            @foreach ($positions as $pos)
                                                <option value="{{ $pos }}"
                                                    {{ old('position', $officer->position) == $pos ? 'selected' : '' }}>
                                                    {{ $pos }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('position')" />
                                    </div>

                                    <div>
                                        <x-input-label for="hierarchy_level" value="Hierarchy Level *" />
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
                                        <x-input-error :messages="$errors->get('hierarchy_level')" />
                                    </div>

                                    <div>
                                        <x-input-label for="order" value="Display Order" />
                                        <x-text-input id="order" name="order" type="number" min="0"
                                            value="{{ old('order', $officer->order) }}" class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('order')" />
                                    </div>
                                </div>
                            </div>

                            <!-- Term Information -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    🗓️ Term Duration
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="term_start" value="Term Start" />
                                        <x-text-input id="term_start" name="term_start" type="date"
                                            value="{{ old('term_start', $officer->term_start?->format('Y-m-d')) }}"
                                            class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('term_start')" />
                                    </div>
                                    <div>
                                        <x-input-label for="term_end" value="Term End" />
                                        <x-text-input id="term_end" name="term_end" type="date"
                                            value="{{ old('term_end', $officer->term_end?->format('Y-m-d')) }}"
                                            class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('term_end')" />
                                    </div>
                                </div>
                            </div>

                            <!-- Photo and Bio -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    🖼️ Photo and Bio
                                </h4>
                                <div class="space-y-4">
                                    @if ($officer->photo_path)
                                        <div>
                                            <p class="text-sm text-gray-600 mb-2">Current Photo:</p>
                                            <img src="{{ $officer->photo_url }}" alt="{{ $officer->full_name }}"
                                                class="w-32 h-32 rounded-lg object-cover border">
                                        </div>
                                    @endif

                                    <input id="photo" type="file" name="photo" accept="image/*"
                                        class="block w-full text-sm text-gray-700 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" />
                                    <p class="text-xs text-gray-500">Max 2MB. JPEG, PNG, JPG, GIF formats only.</p>

                                    <div>
                                        <x-input-label for="bio" value="Biography" />
                                        <textarea id="bio" name="bio" rows="4"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('bio', $officer->bio) }}</textarea>
                                        <x-input-error :messages="$errors->get('bio')" />
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    ⚙️ Status
                                </h4>
                                <select id="status" name="status"
                                    class="block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="active"
                                        {{ old('status', $officer->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $officer->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end mt-10 gap-4 border-t pt-6">
                            <a href="{{ route('officers.index', ['board_id' => $officer->board_id]) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
                                Cancel
                            </a>

                            <div class="flex gap-2">
                                <!-- Save Changes Button -->
                                <button type="button" onclick="openModal('saveChangesModal')"
                                    class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 🟦 Save Confirmation Modal -->
    <x-save-confirmation-modal id="saveChangesModal" title="Save Changes?"
        message="Are you sure you want to save the updates you made for {{ $officer->first_name }} {{ $officer->last_name }}?"
        confirmAction="document.getElementById('editForm').submit()" />

</x-app-layout>
