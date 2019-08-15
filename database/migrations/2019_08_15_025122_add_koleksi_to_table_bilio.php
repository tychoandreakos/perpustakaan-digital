<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKoleksiToTableBilio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibliobigrafi', function (Blueprint $table) {
            $table->unsignedBigInteger('koleksi_id')->after('pola_eksemplar');
            $table->foreign('koleksi_id')->references('id')->on('koleksi');
            $table->string('no_panggil', 100)->after('koleksi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bibliobigrafi', function (Blueprint $table) {
            //
        });
    }
}
