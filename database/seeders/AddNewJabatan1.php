<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddNewJabatan1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            ['nama_jabatan' => 'Bendahara', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Kepala Tata Usaha', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Kepala Bidang', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($jabatan as $data) {
            DB::table('jabatan')->updateOrInsert(
                ['nama_jabatan' => $data['nama_jabatan']], // Kondisi untuk menghindari duplikasi
                $data // Data yang akan diinsert jika tidak ada
            );
        }
    }
}
