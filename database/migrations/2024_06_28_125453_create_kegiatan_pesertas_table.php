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
        Schema::create('kegiatan_perstas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kegiatan_id')->unsigned();
            $table->bigInteger('peserta_id')->unsigned();
            $table->bigInteger('sertifikat_id')->unsigned();
            $table->string('tingkat');
            $table->string('medalis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_perstas');
    }
};
