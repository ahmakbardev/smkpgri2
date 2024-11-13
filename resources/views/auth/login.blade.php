@extends('layouts.layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <!-- Title -->
            <div class="flex flex-col items-center mb-4">
                <img src="{{ asset('assets/images/logo/logo.webp') }}" class="w-1/4" alt="">
                <h2 class="text-lg mt-3 font-semibold text-center text-gray-700">SMK PGRI 2 Malang</h2>
                <p class="text-xs font-medium">School of Business and Technology</p>
            </div>
            {{-- <h2 class="text-3xl font-semibold text-center text-gray-700 mb-8">Login Admin</h2> --}}

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                    <div class="flex items-center border rounded-lg px-3 py-2 bg-gray-50">
                        <i data-feather="mail" class="text-gray-500"></i>
                        <input type="email" id="email" name="email"
                            class="ml-3 w-full bg-transparent focus:outline-none" placeholder="Your email" required>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                    <div class="flex items-center border rounded-lg px-3 py-2 bg-gray-50">
                        <i data-feather="lock" class="text-gray-500"></i>
                        <input type="password" id="password" name="password"
                            class="ml-3 w-full bg-transparent focus:outline-none" placeholder="Your password" required>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-6 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-600">Remember Me</label>
                </div>

                <!-- Login Button -->
                <div class="mb-6">
                    <button type="submit"
                        class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition-all duration-300">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace(); // Load Feather Icons
        });
    </script>
@endsection
