<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ruang', function (Blueprint $field) {
            $field->id('id_ruang', 11);
            $field->string('nama_ruang', 45);
            $field->string('keterangan', 45);
            $field->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ruang');
    }
};
