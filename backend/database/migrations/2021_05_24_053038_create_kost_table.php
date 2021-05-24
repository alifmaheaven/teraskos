<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost', function (Blueprint $table) {
            $table->integer('KostID', true);
            $table->integer('MitraID')->index('mitraID');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('provinsi');
            $table->string('kota');
            $table->integer('kodepos');
            $table->text('alamat');
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
        Schema::dropIfExists('kost');
    }
}
