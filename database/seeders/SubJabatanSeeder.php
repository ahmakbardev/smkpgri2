<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data untuk sub-jabatan Wakil Kepala Sekolah
        $wakilSubJabatan = [
            ['nama_jabatan' => 'Wakil Kepala Sekolah', 'sub_jabatan' => 'Sarana Prasarana'],
            ['nama_jabatan' => 'Wakil Kepala Sekolah', 'sub_jabatan' => 'Kurikulum'],
            ['nama_jabatan' => 'Wakil Kepala Sekolah', 'sub_jabatan' => 'Kesiswaan'],
        ];

        // Data untuk sub-jabatan Kepala Bidang
        $bidangSubJabatan = [
            ['nama_jabatan' => 'Kepala Bidang', 'sub_jabatan' => 'Bismen'],
            ['nama_jabatan' => 'Kepala Bidang', 'sub_jabatan' => 'TI'],
        ];

        DB::table('jabatan')->insertOrIgnore(array_merge($wakilSubJabatan, $bidangSubJabatan));
    }
}
