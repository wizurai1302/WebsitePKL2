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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('image')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->unsignedBigInteger('jurusan');
            $table->foreign('jurusan')->references('id')->on('kategoris');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
