@extends('layouts.layout')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Daftar Guru</h1>

        <!-- Kepala Sekolah -->
        <div class="flex justify-center gap-6 mb-10 place-items-center">
            @foreach ($gurus->where('jabatan.nama_jabatan', 'Kepala Sekolah') as $guru)
                <div
                    class="bg-white rounded-lg shadow-md w-full max-w-[240px] group/name1 max-h-[400px] h-fit overflow-hidden animate-slideIn">
                    <img src="{{ asset($guru->images) }}" alt="{{ $guru->nama }}" class="w-full h-fit object-contain">
                    <div class="p-4">
                        <h2 class="text-base font-bold mb-2 text-wrap">{{ $guru->nama }}</h2>
                        <p class="text-sm text-gray-600">{{ $guru->jabatan->nama_jabatan }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Wakil Kepala Sekolah -->
        <div class="flex justify-center flex-wrap gap-6 mb-10 place-items-center">
            @foreach ($gurus->where('jabatan.nama_jabatan', 'Wakil Kepala Sekolah') as $guru)
                <div
                    class="bg-white rounded-lg shadow-md w-full max-w-[240px] group/name2 max-h-[400px] h-fit overflow-hidden animate-slideIn">
                    <img src="{{ asset($guru->images) }}" alt="{{ $guru->nama }}" class="w-full h-fit object-contain">
                    <div class="p-4">
                        <h2 class="text-base font-bold mb-2 text-wrap">{{ $guru->nama }}</h2>
                        <p class="text-sm text-gray-600">{{ $guru->jabatan->nama_jabatan }}</p>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- Guru -->
        <h2 class="text-2xl font-semibold mb-4">Guru</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach ($gurus->where('jabatan.nama_jabatan', 'Guru') as $guru)
                <div class="bg-white rounded-lg shadow-md overflow-hidden group/name3 max-h-[400px] h-fit animate-slideIn">
                    <img src="{{ asset($guru->images) }}" alt="{{ $guru->nama }}" class="w-full h-fit object-contain">
                    <div class="p-4">
                        <h2 class="text-base font-bold mb-2 text-wrap">{{ $guru->nama }}</h2>
                        <p class="text-sm text-gray-600">{{ $guru->jabatan->nama_jabatan }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Karyawan -->
        <h2 class="text-2xl font-semibold my-6">Karyawan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach ($gurus->where('jabatan.nama_jabatan', 'Karyawan') as $guru)
                <div class="bg-white rounded-lg shadow-md overflow-hidden group/name4 max-h-[400px] h-fit animate-slideIn">
                    <img src="{{ asset($guru->images) }}" alt="{{ $guru->nama }}" class="w-full h-fit object-contain">
                    <div class="p-4">
                        <h2 class="text-base font-bold mb-2 text-wrap">{{ $guru->nama }}</h2>
                        <p class="text-sm text-gray-600">{{ $guru->jabatan->nama_jabatan }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <style>
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slideIn {
            animation: slideIn 0.5s ease-out;
        }
    </style>
@endsection
