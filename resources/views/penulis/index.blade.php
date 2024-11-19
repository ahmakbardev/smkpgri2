@extends('penulis.layouts.layout')

@section('penulis-content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('penulis.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
            <input type="text" id="name" name="name" class="w-full p-2 border rounded-lg" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border rounded-lg" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password Baru</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded-lg">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Konfirmasi Password Baru</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label for="profile_picture" class="block text-gray-700 font-bold mb-2">Foto Profil</label>
            <input type="file" id="profile_picture" name="profile_picture" class="w-full p-2 border rounded-lg">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="mt-2 w-20 h-20 object-cover object-center rounded-full">
            @endif
            @error('profile_picture')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update Profile</button>
    </form>
</div>
@endsection
