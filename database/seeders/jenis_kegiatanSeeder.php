<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenis_kegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_kegiatans')->insert([
            [
                'nama' => 'Online',
                'deskripsi' => 'Kegiatan yang dilakukan secara online'
            ],
            [
                'nama' => 'Offline',
                'deskripsi' => 'Kegiatan yang dilakukan secara offline'
            ],
            [
                'nama' => 'Hybrid',
                'deskripsi' => 'Kegiatan yang dilakukan secara hybrid'
            ]
        ]);
    }
}
