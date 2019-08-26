<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLokasiToBilio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibliobigrafi', function (Blueprint $table) {
           $table->unsignedBigInteger('lokasi_rak_id')->after('koleksi_id')->nullable();

           $table->foreign('lokasi_rak_id')->references('id')->on('lokasi_rak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bibliobigrafi', function (Blueprint $table) {
            //
        });
    }
}
