<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('pengarang_id');
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('bahasa_id');
            $table->unsignedBigInteger('penerbit_id');
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');
            $table->foreign('pengarang_id')->references('id')->on('pengarang')->onDelete('cascade');
            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('cascade');
            $table->foreign('bahasa_id')->references('id')->on('bahasa')->onDelete('cascade');
            $table->foreign('penerbit_id')->references('id')->on('penerbit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_transaksi');
    }
}
