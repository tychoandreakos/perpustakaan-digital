<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePinjamTransaksiAddStatusDenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinjam_transaksi', function (Blueprint $table) {
           $table->boolean('status_denda')->default(0)->after('status_pinjam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinjam_transaksi', function (Blueprint $table) {
            //
        });
    }
}
