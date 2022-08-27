<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeknisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teknisis', function (Blueprint $table) {
            $table->bigIncrements('id_teknisi');
            $table->string('nama_teknisi');
            $table->bigInteger('no_hp');
            // $table->unsignedBigInteger('id_transaksi');
            
            // $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksis')
            // ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('teknisis');
    }
}
