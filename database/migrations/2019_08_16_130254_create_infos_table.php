<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('regular', 50);
            $table->string('waktu_regular', 50);
            $table->string('weekend', 50)->nullable();
            $table->string('waktu_weekend', 50)->nullable();
            $table->string('waktu_istirahat', 50);
            $table->string('alamat', 100);
            $table->string('no_telp', 50);
            $table->string('pustakawan', 50);
            $table->string('email', 50);
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
        Schema::dropIfExists('info');
    }
}
