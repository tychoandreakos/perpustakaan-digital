<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliobigrafisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliobigrafi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('klasifikasi_id');
            $table->string('pola_eksemplar');
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('buku');
            $table->foreign('klasifikasi_id')->references('id')->on('klasifikasi');
            $table->foreign('pola_eksemplar')->references('pola_eksemplar')->on('eksemplar_transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliobigrafi');
    }
}
