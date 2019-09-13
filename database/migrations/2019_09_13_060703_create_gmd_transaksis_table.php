<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGmdTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gmd_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bibliobigrafi_id');
            $table->unsignedBigInteger('gmd_id');
            $table->timestamps();

            $table->foreign('bibliobigrafi_id')->references('id')->on('bibliobigrafi');
            $table->foreign('gmd_id')->references('id')->on('gmd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gmd_transaksi');
    }
}
