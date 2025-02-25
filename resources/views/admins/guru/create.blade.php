@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold mb-6">Tambah Guru</h1>

        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2">
                    <!-- Nama Guru -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-4">
                        <label for="jabatan_id" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <select id="jabatan_id" name="jabatan_id"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" disabled selected>Pilih Jabatan</option>
                            @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="sub_jabatan" class="block text-sm font-medium text-gray-700">Sub Jabatan</label>
                        <select id="sub_jabatan" name="sub_jabatan"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" disabled selected>Pilih Sub Jabatan</option>
                        </select>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const jabatanSelect = document.getElementById('jabatan_id');
                            const subJabatanSelect = document.getElementById('sub_jabatan');

                            const subJabatanOptions = {
                                'Wakil Kepala Sekolah': ['Sarana Prasarana', 'Kurikulum', 'Kesiswaan'],
                                'Kepala Bidang': ['Bismen', 'TI']
                            };

                            jabatanSelect.addEventListener('change', (event) => {
                                const selectedJabatan = event.target.options[event.target.selectedIndex].text;

                                subJabatanSelect.innerHTML =
                                '<option value="" disabled selected>Pilih Sub Jabatan</option>';
                                if (subJabatanOptions[selectedJabatan]) {
                                    subJabatanOptions[selectedJabatan].forEach(option => {
                                        const opt = document.createElement('option');
                                        opt.value = option;
                                        opt.textContent = option;
                                        subJabatanSelect.appendChild(opt);
                                    });
                                }
                            });
                        });
                    </script>


                    <!-- Foto Guru -->
                    <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" id="images" name="images"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
