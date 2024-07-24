<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $field) {
            $field->id('id_pegawai', 11);
            $field->foreignId('id_user', 11);
            $field->string('nama_pegawai', 100);
            $field->string('nip', 45);
            $field->text('alamat');
            $field->unsignedInteger('status');
            $field->timestamps();
            $field->foreign('id_user')->references('id_user')->on('user')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
