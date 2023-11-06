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
        Schema::create('profile_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('lokasi');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_perusahaan');
    }
};
