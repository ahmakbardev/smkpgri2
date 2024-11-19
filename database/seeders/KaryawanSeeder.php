<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::firstOrCreate(
        $jabatan = [
            ['nama_jabatan' => 'Karyawan'],
        ]);

        DB::table('jabatan')->insert($jabatan);
    }
}
