<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListhargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listharga', function (Blueprint $table) {
            $table->integer('HargaID', true);
            $table->integer('KamarID')->index('KamarID');
            $table->integer('penghuni');
            $table->integer('lama');
            $table->integer('harga');
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
        Schema::dropIfExists('listharga');
    }
}
