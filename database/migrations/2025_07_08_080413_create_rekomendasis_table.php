<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('penggunas')->onDelete('cascade');

            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');
            $table->float('skor_total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekomendasis');
    }
};
