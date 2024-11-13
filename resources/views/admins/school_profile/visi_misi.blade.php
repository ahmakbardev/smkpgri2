@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Visi dan Misi Sekolah</h1>

        <form action="{{ route('school_profile.store_or_update_visi_misi') }}" method="POST">
            @csrf

            <!-- Visi Input -->
            <div class="mb-4">
                <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
                <input type="text" id="visi" name="visi" value="{{ old('visi', $schoolProfile->visi ?? '') }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>

            <!-- Misi Input -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Misi</label>
                <div id="misiContainer">
                    @if (isset($schoolProfile) && is_array(json_decode($schoolProfile->misi)))
                        @foreach (json_decode($schoolProfile->misi) as $misi)
                            <div class="flex items-center mb-2">
                                <input type="text" name="misi[]" value="{{ $misi }}"
                                    class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <button type="button" class="ml-2 text-red-500 removeMisi">✕</button>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center mb-2">
                            <input type="text" name="misi[]"
                                class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <button type="button" class="ml-2 text-red-500 removeMisi">✕</button>
                        </div>
                    @endif
                </div>
                <button type="button" id="addMisiButton" class="mt-2 text-blue-500">Tambah Misi</button>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                    {{ isset($schoolProfile) ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const misiContainer = document.getElementById('misiContainer');
            const addMisiButton = document.getElementById('addMisiButton');

            // Function to add a new Misi input field
            function addMisiInput(value = '') {
                const misiDiv = document.createElement('div');
                misiDiv.classList.add('flex', 'items-center', 'mb-2');

                const misiInput = document.createElement('input');
                misiInput.type = 'text';
                misiInput.name = 'misi[]';
                misiInput.value = value;
                misiInput.classList.add('block', 'w-full', 'p-2', 'border', 'border-gray-300', 'rounded-md',
                    'shadow-sm', 'focus:ring-blue-500', 'focus:border-blue-500', 'sm:text-sm');

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('ml-2', 'text-red-500', 'removeMisi');
                removeButton.innerText = '✕';

                removeButton.addEventListener('click', function() {
                    misiDiv.remove();
                });

                misiDiv.appendChild(misiInput);
                misiDiv.appendChild(removeButton);
                misiContainer.appendChild(misiDiv);
            }

            // Event listener for adding a new Misi input field
            addMisiButton.addEventListener('click', function() {
                addMisiInput();
            });

            // Initial event listener to remove Misi inputs
            document.querySelectorAll('.removeMisi').forEach(button => {
                button.addEventListener('click', function() {
                    button.parentElement.remove();
                });
            });
        });
    </script>
@endsection
