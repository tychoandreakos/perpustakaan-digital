<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEksemplarTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksemplar_transaksi', function (Blueprint $table) {
            $table->string('pola_eksemplar')->primary();
            $table->string('kode_eksemplar');
            $table->timestamps();

            $table->foreign('kode_eksemplar')->references('kode_eksemplar')->on('eksemplar_pola')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eksemplar_transaksi');
    }
}
