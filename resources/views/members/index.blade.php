<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="ont-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                👥 Members
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ✅ Success Message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-6 flex justify-between items-center flex-wrap gap-3">
                        <form method="GET" action="{{ route('members.index') }}" class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search by name or contact..."
                                class="w-72 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded-md hover:bg-gray-700 transition">
                                Search
                            </button>
                            @if (request('search'))
                                <a href="{{ route('members.index') }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 text-sm font-semibold rounded-md hover:bg-gray-400 transition">
                                    Clear
                                </a>
                            @endif
                        </form>

                        <a href="{{ route('members.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded-md shadow hover:bg-gray-700 transition">
                            + Add Member
                        </a>
                    </div>


                    {{-- 📋 Members Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Age</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gender</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($members as $member)
                                    <tr>
                                        {{-- Full Name --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $member->first_name }} {{ $member->middle_name }}
                                                {{ $member->last_name }}
                                            </div>
                                        </td>

                                        {{-- Age --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $member->age }}
                                        </td>

                                        {{-- Category --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @switch($member->age_category)
                                                    @case('Children') bg-green-100 text-green-800 @break
                                                    @case('CYF') bg-yellow-100 text-yellow-800 @break
                                                    @case('CYAF') bg-purple-100 text-purple-800 @break
                                                    @case('UCM') bg-indigo-100 text-indigo-800 @break
                                                    @default bg-pink-100 text-pink-800
                                                @endswitch">
                                                {{ $member->age_category }}
                                            </span>
                                        </td>

                                        {{-- Gender --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $member->gender }}
                                        </td>

                                        {{-- Contact --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $member->contact_number }}
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $member->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                {{-- View --}}
                                                <a href="{{ route('members.show', $member) }}"
                                                    class="text-blue-600 hover:text-blue-900" title="View Details">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                                                            9.542 7-1.274 4.057-5.064 7-9.542 7
                                                            -4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('members.edit', $member) }}"
                                                    class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11
                                                            a2 2 0 002-2v-5m-1.414-9.414
                                                            a2 2 0 112.828 2.828L11.828 15H9v-2.828
                                                            l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <form id="deleteForm" method="POST"
                                                    action="{{ route('members.destroy', $member) }}">
                                                    @csrf
                                                    @method('DELETE'){{-- Delete using Modal --}}
                                                    <button type="button" onclick="openModal('deleteMemberModal')"
                                                        class="text-red-600 hover:text-red-900" title="Delete">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                            a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0
                                                            00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                            No members found.
                                            <a href="{{ route('members.create') }}"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                Add your first member
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if ($members->hasPages())
                        <div class="flex justify-end mt-4">
                            <nav class="flex items-center space-x-1 text-sm">
                                @foreach ($members->links()->elements[0] as $page => $url)
                                    @if ($page == $members->currentPage())
                                        <span
                                            class="px-3 py-1 bg-gray-800 text-white rounded">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-3 py-1 text-gray-700 hover:bg-gray-100 rounded transition">{{ $page }}</a>
                                    @endif
                                @endforeach
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Clean Mobile-Friendly Confirmation Modal -->
    <x-confirmation-modal id="deleteMemberModal" title="Delete Member?"
        message="Are you sure you want to delete {{ $member->first_name }} {{ $member->last_name }}? This action cannot be undone."
        confirmAction="document.getElementById('deleteForm').submit()" />

</x-app-layout>
