<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'author@example.com'],
            [
                'name' => 'Penulis Utama',
                'password' => Hash::make('password123'),
                'role' => 'Penulis',
            ]
        );
    }
}
