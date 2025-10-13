<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('👤 Member Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

                <!-- Header Section -->
                <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 p-5 text-white">
                    <div class="flex items-center space-x-6">
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold mb-2">
                                {{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }}
                            </h3>

                            <div class="flex flex-wrap gap-3">
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-medium
                                    {{ $member->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $member->is_active ? 'Active Member' : 'Inactive' }}
                                </span>
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-medium
                                    @if ($member->age_category == 'Children') bg-green-100 text-green-800
                                    @elseif($member->age_category == 'CYF') bg-yellow-100 text-yellow-800
                                    @elseif($member->age_category == 'CYAF') bg-purple-100 text-purple-800
                                    @elseif($member->age_category == 'UCM') bg-indigo-100 text-indigo-800
                                    @else bg-pink-100 text-pink-800 @endif">
                                    {{ $member->age_category }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-8 space-y-10">
                    <!-- Personal Information -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                            🧾 Personal Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ([
        'First Name' => $member->first_name,
        'Middle Name' => $member->middle_name ?: 'N/A',
        'Last Name' => $member->last_name,
        'Gender' => $member->gender,
        'Date of Birth' => $member->birthdate->format('F d, Y'),
        'Age' => $member->age . ' years old',
        'Member Since' => $member->created_at->format('F d, Y'),
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
                                <label class="block text-sm font-medium text-gray-500 mb-1">Contact Number</label>
                                <p class="text-lg text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    {{ $member->contact_number }}
                                </p>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-1">Address</label>
                                <p class="text-lg text-gray-900 flex items-start">
                                    <svg class="w-5 h-5 mr-2 mt-1 text-indigo-500 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $member->address }}
                                </p>
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
                                <label class="block text-sm font-medium text-gray-500 mb-1">Father's Name</label>
                                <p class="text-lg text-gray-900">{{ $member->father_name ?: 'Not provided' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Mother's Name</label>
                                <p class="text-lg text-gray-900">{{ $member->mother_name ?: 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Record Info -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-4 border-b-2 border-indigo-500 pb-2">
                            🗂 Record Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Record Created</label>
                                <p class="text-lg text-gray-900">{{ $member->created_at->format('F d, Y h:i A') }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                                <p class="text-lg text-gray-900">{{ $member->updated_at->format('F d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('members.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back
                        </a>

                        <a href="{{ route('members.edit', $member) }}"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        <form action="{{ route('members.destroy', $member) }}" method="POST"
                            onsubmit="return confirm('Delete this member?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
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
