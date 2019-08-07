<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEksemplarPolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksemplar_pola', function (Blueprint $table) {
            $table->string('kode_eksemplar')->primary();
            $table->integer('prefix');
            $table->integer('serial');
            $table->integer('suffix');
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
        Schema::dropIfExists('eksemplar_pola');
    }
}
