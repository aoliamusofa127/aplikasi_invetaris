<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $field) {
            $field->id('id_peminjaman', 11);
            $field->foreignId('id_pegawai', 11);
            $field->date('tanggal_pinjam');
            $field->date('tanggal_kembali');
            $field->unsignedInteger('status_peminjaman');
            $field->timestamps();
            $field->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
