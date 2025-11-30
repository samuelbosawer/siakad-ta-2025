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
        Schema::create('form_kkns', function (Blueprint $table) {
        $table->id();
            $table->date('tanggal')->nullable();
            $table->string('kem_studi')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('mahasiswa_id');    // FK ke mahasiswa
            $table->unsignedBigInteger('kkn_id')->nullable();  // sesuai gambar
            // relasi mahasiswa
            $table->foreign('mahasiswa_id')
                  ->references('id')
                  ->on('mahasiswas')
                  ->onDelete('cascade');

            // relasi KKN
             $table->foreign('kkn_id')
                  ->references('id')
                  ->on('kkns')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_kkns');
    }
};
