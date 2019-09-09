<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique();
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_registrasi');
            $table->date('tgl_expired');
            $table->string('alamat')->nullable();
            $table->boolean('jk')->nullable();
            $table->string('no_telp', 50)->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
