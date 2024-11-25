<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            ['nama_jabatan' => 'Kepala Sekolah', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Wakil Kepala Sekolah', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Guru', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($jabatan as $data) {
            \App\Models\Jabatan::firstOrCreate(
                ['nama_jabatan' => $data['nama_jabatan']], // Kondisi pencarian
                $data // Data untuk di-insert jika tidak ditemukan
            );
        }
    }
}
