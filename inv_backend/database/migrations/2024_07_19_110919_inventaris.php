<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $field) {
            $field->id('id_inventaris', 11);
            $field->foreignId('id_ruang', 11);
            $field->string('nama', 100);
            $field->string('kondisi', 45);
            $field->string('keterangan', 45);
            $field->unsignedInteger('jumlah');
            $field->date('tanggal_register');
            $field->timestamps();
            $field->foreign('id_ruang')->references('id_ruang')->on('ruang')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
