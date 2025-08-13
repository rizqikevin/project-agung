<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jawabans', function (Blueprint $table) {
            // Hapus foreign key lama (ke tabel siswas)
            $table->dropForeign(['siswa_id']);

            // Tambahkan foreign key baru (ke tabel penggunas)
            $table->foreign('siswa_id')
                ->references('id')
                ->on('penggunas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('jawabans', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);

            // Kembalikan foreign key ke tabel siswas jika perlu rollback
            $table->foreign('siswa_id')
                ->references('id')
                ->on('siswas')
                ->onDelete('cascade');
        });
    }
};
