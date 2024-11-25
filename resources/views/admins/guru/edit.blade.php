@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold mb-6">Edit Guru</h1>

        <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2">
                    <!-- Nama Guru -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $guru->nama) }}"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-4">
                        <label for="jabatan_id" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <select id="jabatan_id" name="jabatan_id"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" disabled>Pilih Jabatan</option>
                            @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}" data-sub-jabatan="{{ $j->sub_jabatan ?? '' }}"
                                    {{ $guru->jabatan_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>


                    </div>

                    <!-- Sub Jabatan -->
                    <div class="mb-4">
                        <label for="sub_jabatan" class="block text-sm font-medium text-gray-700">Sub Jabatan</label>
                        <select id="sub_jabatan" name="sub_jabatan"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled>Pilih Sub Jabatan</option>
                        </select>
                    </div>

                    <!-- Foto Guru -->
                    <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-700">Foto</label>
                        @if ($guru->images)
                            <img src="{{ asset($guru->images) }}" alt="Foto Guru" class="w-32 h-32 mb-4">
                        @endif
                        <input type="file" id="images" name="images"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jabatanSelect = document.getElementById('jabatan_id');
            const subJabatanSelect = document.getElementById('sub_jabatan');

            const initializeSubJabatan = () => {
                const selectedOption = jabatanSelect.options[jabatanSelect.selectedIndex];
                const subJabatanData = selectedOption.getAttribute('data-sub-jabatan');

                // Kosongkan sub_jabatan dropdown
                subJabatanSelect.innerHTML = '<option value="" disabled>Pilih Sub Jabatan</option>';

                if (subJabatanData) {
                    // Pisahkan sub_jabatan berdasarkan koma dan buat opsi
                    subJabatanData.split(',').forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.trim();
                        option.textContent = sub.trim();

                        // Jika sub_jabatan sudah dipilih sebelumnya
                        if (sub.trim() === '{{ $guru->sub_jabatan }}') {
                            option.selected = true;
                        }

                        subJabatanSelect.appendChild(option);
                    });
                }
            };

            // Inisialisasi sub_jabatan saat halaman dimuat
            initializeSubJabatan();

            // Update sub_jabatan saat jabatan berubah
            jabatanSelect.addEventListener('change', initializeSubJabatan);
        });
    </script>
@endsection
