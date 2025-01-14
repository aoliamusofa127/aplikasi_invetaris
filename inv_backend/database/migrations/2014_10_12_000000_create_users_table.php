<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user', 11);
            $table->string('username', 45);
            $table->string('password', 100);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
