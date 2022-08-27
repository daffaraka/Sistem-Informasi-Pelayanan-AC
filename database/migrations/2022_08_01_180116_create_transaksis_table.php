<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id_user');
            $table->string('alamat');
            $table->bigInteger('jumlah_ac');
            $table->bigInteger('nomor_hp');
            $table->unsignedBigInteger('id_layanan');
            $table->string('penerima_layanan');
            $table->bigInteger('biaya_jasa');
            $table->string('metode_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status');
            $table->date('tanggal_kedatangan');
            $table->time('waktu_kedatangan');
            $table->date('garansi')->nullable();
            $table->string('updated_by');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_layanan')->references('id_layanan')->on('layanans')
                ->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
