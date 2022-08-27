<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id_review');
            $table->string('comment');
            $table->bigInteger('rating');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_transaksi');

            $table->foreign('id_layanan')->references('id_layanan')->on('layanans')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksis')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
