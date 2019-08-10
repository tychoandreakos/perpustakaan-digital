<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBilioAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibliobigrafi', function (Blueprint $table) {
            $table->boolean('status_pinjam')->default(0)->after('pola_eksemplar');
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
