<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="ont-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                ➕ {{ __('Add New Member') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

                <!-- Header -->
                <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 p-6">
                    <h3 class="text-2xl font-bold text-white">
                        New Member Registration
                    </h3>
                    <p class="text-indigo-100 text-sm mt-1">
                        Please fill out all the required personal and contact details below.
                    </p>
                </div>

                <!-- Form -->
                <div class="p-8 text-gray-900">
                    <form id="addMemberForm" method="POST" action="{{ route('members.store') }}">
                        @csrf

                        <div class="space-y-10">
                            <!-- Personal Information -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    🧾 Personal Information
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="first_name" value="First Name *" />
                                        <x-text-input id="first_name" type="text" name="first_name"
                                            value="{{ old('first_name') }}" class="w-full mt-1" required />
                                        <x-input-error :messages="$errors->get('first_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="middle_name" value="Middle Name" />
                                        <x-text-input id="middle_name" type="text" name="middle_name"
                                            value="{{ old('middle_name') }}" class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('middle_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="last_name" value="Last Name *" />
                                        <x-text-input id="last_name" type="text" name="last_name"
                                            value="{{ old('last_name') }}" class="w-full mt-1" required />
                                        <x-input-error :messages="$errors->get('last_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="birthdate" value="Birthdate *" />
                                        <x-text-input id="birthdate" type="date" name="birthdate"
                                            value="{{ old('birthdate') }}" class="w-full mt-1" required />
                                        <x-input-error :messages="$errors->get('birthdate')" />
                                    </div>

                                    <div>
                                        <x-input-label for="gender" value="Gender *" />
                                        <select id="gender" name="gender"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('gender')" />
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    ☎️ Contact Information
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="contact_number" value="Contact Number *" />
                                        <x-text-input id="contact_number" type="text" name="contact_number"
                                            value="{{ old('contact_number') }}" class="w-full mt-1" required />
                                        <x-input-error :messages="$errors->get('contact_number')" />
                                    </div>

                                    <div class="md:col-span-2">
                                        <x-input-label for="address" value="Address *" />
                                        <textarea id="address" name="address" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            required>{{ old('address') }}</textarea>
                                        <x-input-error :messages="$errors->get('address')" />
                                    </div>
                                </div>
                            </div>

                            <!-- Family Information -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                                    👪 Family Information
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="father_name" value="Father's Name" />
                                        <x-text-input id="father_name" type="text" name="father_name"
                                            value="{{ old('father_name') }}" class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('father_name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="mother_name" value="Mother's Name" />
                                        <x-text-input id="mother_name" type="text" name="mother_name"
                                            value="{{ old('mother_name') }}" class="w-full mt-1" />
                                        <x-input-error :messages="$errors->get('mother_name')" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end mt-10 gap-4 border-t pt-6">
                            <a href="{{ route('members.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
                                Cancel
                            </a>

                            <button type="button" onclick="openModal('addMemberModal')"
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                                Add Member
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 🟦 Add Confirmation Modal -->
    <x-save-confirmation-modal id="addMemberModal" title="Add This Member?"
        message="Are you sure you want to save this new member’s information?"
        confirmAction="document.getElementById('addMemberForm').submit()" />
</x-app-layout>
