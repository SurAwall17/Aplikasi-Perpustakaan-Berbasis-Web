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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjaman');
            $table->foreign('id_peminjaman')->references('id')->on('peminjaman')->cascadeOnDelete();
            $table->unsignedBigInteger('id_kategori_denda');
            $table->foreign('id_kategori_denda')->references('id')->on('kategori_denda')->cascadeOnDelete();

            $table->date('tgl_kembali');
            $table->string('denda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
