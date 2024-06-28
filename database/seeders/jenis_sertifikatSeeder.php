<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenis_sertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_sertifikats')->insert([
            [
                'nama' => "Sertifikat Lomba",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta lomba"
            ],
            [
                'nama' => "Sertifikat Kontes",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta kontes"
            ],
            [
                'nama' => "Sertifikat Kursus",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta kursus"
            ],
            [
                'nama' => "Sertifikat Pelatihan",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta pelatihan"
            ],
            [
                'nama' => "Sertifikat Seminar",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta seminar"
            ],
            [
                'nama' => "Sertifikat Webinar",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta webinar"
            ],
            [
                'nama' => "Sertifikat Konferensi",
                'deskripsi' => "Sertifikat yang diberikan kepada peserta konferensi"
            ]
        ]);
    }
}
