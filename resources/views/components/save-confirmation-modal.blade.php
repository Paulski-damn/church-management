<div id="{{ $id }}" class="fixed inset-0 bg-black bg-opacity-30 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-sm">
        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">
                {{ $title ?? 'Save Changes?' }}
            </h3>
        </div>

        <!-- Message -->
        <div class="px-5 py-4 text-gray-700 text-sm">
            {{ $message ?? 'Are you sure you want to save the updates you made? Please review all information before confirming.' }}
        </div>

        <!-- Actions -->
        <div class="px-5 py-4 flex justify-end gap-3 border-t border-gray-200">
            <button onclick="closeModal('{{ $id }}')"
                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition">
                Cancel
            </button>
            <button onclick="{{ $confirmAction }}"
                class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
