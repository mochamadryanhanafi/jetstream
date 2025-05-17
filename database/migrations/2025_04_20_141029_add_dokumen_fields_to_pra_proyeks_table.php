<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokumenFieldsToPraProyeksTable extends Migration
{
    public function up()
    {
        Schema::table('pra_proyeks', function (Blueprint $table) {
            // Pastikan kolom 'tanggal_usulan' ada jika menggunakan 'after()'
            // Jika tidak ada kolom 'tanggal_usulan', maka hilangkan bagian 'after('tanggal_usulan')'
            $table->json('dokumen')->nullable(); // Menghilangkan 'after'
            $table->enum('status_dokumen', ['ada', 'belum'])->default('belum');
            $table->enum('keterangan_status', ['lengkap', 'belum'])->default('belum');
        });
    }

    public function down()
    {
        Schema::table('pra_proyeks', function (Blueprint $table) {
            $table->dropColumn(['dokumen', 'status_dokumen', 'keterangan_status']);
        });
    }
}
