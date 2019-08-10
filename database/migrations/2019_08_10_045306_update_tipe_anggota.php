<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTipeAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipe_anggota', function (Blueprint $table) {
            $table->integer('masa_pinjaman_buku')->after('jumlah_pinjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipe_anggota', function (Blueprint $table) {
            //
        });
    }
}
