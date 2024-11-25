@extends('admins.layouts.layout')

@section('admin-content')
    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold mb-6">Daftar Guru</h1>
        <a href="{{ route('guru.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Guru</a>
        <table class="table-auto w-full mt-6 bg-white rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jabatan</th>
                    <th class="px-4 py-2">Sub Jabatan</th>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $key => $g)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $key + 1 }}</td>
                        <td class="border px-4 py-2">{{ $g->nama }}</td>
                        <td class="border px-4 py-2">{{ $g->jabatan->nama_jabatan }}</td>
                        <td class="border px-4 py-2">
                            @if ($g->sub_jabatan)
                                {{ $g->sub_jabatan }}
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            @if ($g->images)
                                <img src="{{ asset($g->images) }}" alt="Foto Guru" class="w-16 h-16 rounded-full mx-auto">
                            @else
                                <span class="text-gray-500">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('guru.edit', $g->id) }}"
                                class="bg-yellow-400 text-white px-4 py-2 rounded">Edit</a>
                            <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
