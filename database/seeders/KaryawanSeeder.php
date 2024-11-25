<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            ['nama_jabatan' => 'Karyawan', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($jabatan as $data) {
            \App\Models\Jabatan::firstOrCreate(
                ['nama_jabatan' => $data['nama_jabatan']], // Kondisi pencarian
                $data // Data yang akan di-insert jika tidak ditemukan
            );
        }
    }
}
