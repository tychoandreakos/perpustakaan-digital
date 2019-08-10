<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBukutransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger("lokasi_id")->after('penerbit_id');

            $table->foreign('lokasi_id')->references('id')->on('lokasi_rak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buku_transaksi', function (Blueprint $table) {
            //
        });
    }
}
