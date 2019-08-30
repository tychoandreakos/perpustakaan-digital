<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVerificationToPinjamTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinjam_transaksi', function (Blueprint $table) {
            $table->string('kode_pinjam', 10)->after('status_denda')->nullable();
            $table->timestamp('verified_at')->before('created_at')->nullable();
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
