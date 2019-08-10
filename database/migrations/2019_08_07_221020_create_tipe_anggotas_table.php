<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipeAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipe_anggota', 50);
            $table->integer('jumlah_pinjaman');
            $table->integer('masa_berlaku_anggota');
            $table->integer('batas_perpanjangan_anggota');
            $table->integer('denda');
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
        Schema::dropIfExists('tipe_anggota');
    }
}
