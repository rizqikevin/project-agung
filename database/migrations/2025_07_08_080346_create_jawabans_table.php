<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('penggunas')->onDelete('cascade');

            $table->foreignId('pertanyaan_id')->constrained('pertanyaans')->onDelete('cascade');
            $table->tinyInteger('nilai'); // jawaban siswa (skala 1–5)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
