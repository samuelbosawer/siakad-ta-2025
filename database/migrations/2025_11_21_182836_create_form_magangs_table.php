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
        Schema::create('form_magangs', function (Blueprint $table) {
                $table->id();
            $table->string('berkas')->nullable();        // file SK / surat / dokumen
            $table->date('tanggal')->nullable();
            $table->text('ket')->nullable();             // keterangan tambahan
            $table->string('status')->nullable();
            // foreign key ke tabel magangs
            $table->unsignedBigInteger('id_magang');
            $table->foreign('id_magang')
                ->references('id')->on('magangs')
                ->onDelete('cascade');

            // foreign key ke tabel mahasiswas
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')
                ->references('id')->on('mahasiswas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_magangs');
    }
};
