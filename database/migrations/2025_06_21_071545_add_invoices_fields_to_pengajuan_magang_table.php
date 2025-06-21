<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoicesFieldsToPengajuanMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_magang', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_magang', function (Blueprint $table) {
            $table->integer('durasi_bulan')->nullable(); // durasi magang
            $table->integer('biaya_per_mahasiswa')->nullable(); // dalam rupiah
            $table->integer('total_biaya')->nullable(); // total hasil perkalian
        });
    }
}
