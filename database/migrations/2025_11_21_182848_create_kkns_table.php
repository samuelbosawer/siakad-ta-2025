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
        Schema::create('kkns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kkn');
            $table->year('tahun')->nullable();   // ubah dari tanggal → tahun
            $table->string('status')->nullable();
            $table->string('sk')->nullable();
            // tanpa timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kkns');
    }
};
