<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('bibliobigrafi_id')->nullable();
            $table->date('tgl_pinjam')->nullable();
            $table->timestamp('tanggal_habis_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable()->nullable();
            $table->boolean('status_pinjam')->default('1')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bibliobigrafi_id')->references('id')->on('bibliobigrafi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjam_transaksi');
    }
}
