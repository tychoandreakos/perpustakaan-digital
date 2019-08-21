<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopikToBukuTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('topik_id')->after('penerbit_id')->nullable();

            $table->foreign('topik_id')->references('id')->on('topik');
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
