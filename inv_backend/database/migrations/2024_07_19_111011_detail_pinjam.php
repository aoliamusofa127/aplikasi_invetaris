<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pinjam', function (Blueprint $field) {
            $field->id('id_pinjam', 11);
            $field->foreignId('id_peminjaman', 11);
            $field->foreignId('id_inventaris');
            $field->string('jumlah', 45);
            $field->timestamps();
            $field->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->cascadeOnUpdate()->cascadeOnDelete();
            $field->foreign('id_inventaris')->references('id_inventaris')->on('inventaris')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pinjam');
    }
};
