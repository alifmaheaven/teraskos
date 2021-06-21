<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilkamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilkamar', function (Blueprint $table) {
            $table->integer('FasilID', true);
            $table->string('nama', 50);
            $table->text('deskripsi');
            $table->integer('harga');
            $table->integer('KamarID')->index('KamarID');
            $table->integer('isActive');
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
        Schema::dropIfExists('fasilkamar');
    }
}
