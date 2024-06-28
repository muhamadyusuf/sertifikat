<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_kegiatan_id');
            $table->bigInteger('user_id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('banner');
            $table->datetime('mulai_daftar');
            $table->datetime('akhir_daftar');
            $table->date('tgl_kegiatan');
            $table->integer('biaya');
            $table->string('juknis');
            $table->integer('kuota');
            $table->integer('sisa_kuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
