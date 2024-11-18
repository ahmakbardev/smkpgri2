<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data admin hanya jika belum ada
        \App\Models\Admin::firstOrCreate(
            ['email' => 'admin@example.com'], // Cek berdasarkan email
            [
                'name' => 'Super Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('password123'), // Password hashing
            ]
        );
    }
}
