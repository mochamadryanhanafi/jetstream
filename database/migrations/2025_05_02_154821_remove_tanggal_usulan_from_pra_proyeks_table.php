<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTanggalUsulanFromPraProyeksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cek apakah kolom 'dokumen' sudah ada, jika belum, baru ditambahkan
        if (!Schema::hasColumn('pra_proyeks', 'dokumen')) {
            Schema::table('pra_proyeks', function (Blueprint $table) {
                $table->json('dokumen')->nullable()->after('status'); // Menambahkan kolom 'dokumen'
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom 'dokumen' jika ada
        Schema::table('pra_proyeks', function (Blueprint $table) {
            $table->dropColumn('dokumen');
        });
    }
}
