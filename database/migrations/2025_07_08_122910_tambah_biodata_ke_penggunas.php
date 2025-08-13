<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->string('nama_lengkap')->nullable();
            $table->string('nis')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('asal_sekolah')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->dropColumn(['nama_lengkap', 'nis', 'jenis_kelamin', 'asal_sekolah']);
        });
    }
};
