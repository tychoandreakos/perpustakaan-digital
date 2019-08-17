<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('edisi', 100)->nullable();
            $table->string('isbn_isnn', 40);
            $table->string('deskripsi_fisik', 100);
            $table->string('judul_seri', 100)->nullable();
            $table->text('catatan')->nullable();
            $table->string('slug');
            $table->string('gambar_sampul', 50)->nullable();
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
        Schema::dropIfExists('buku');
    }
}
