<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopikToBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->unsignedBigInteger('topik_id')->after('judul_seri')->nullable();

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
        Schema::table('buku', function (Blueprint $table) {
            //
        });
    }
}
