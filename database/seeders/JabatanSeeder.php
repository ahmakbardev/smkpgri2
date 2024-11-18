<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            ['nama_jabatan' => 'Kepala Sekolah'],
            ['nama_jabatan' => 'Wakil Kepala Sekolah'],
            ['nama_jabatan' => 'Guru'],
        ];

        DB::table('jabatan')->insert($jabatan);
    }
}
