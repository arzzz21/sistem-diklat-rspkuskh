<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kampus_id')->constrained('kampus')->onDelete('cascade');
            $table->date('tanggal_pengajuan');
            $table->string('status')->default('menunggu'); // menunggu, menunggu_pembayaran, diproses, selesai
            $table->string('invoice_file')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('durasi_bulan')->nullable(); // durasi magang
            $table->integer('biaya_per_mahasiswa')->nullable(); // dalam rupiah
            $table->integer('total_biaya')->nullable(); // total hasil perkalian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_magang');
    }
}
