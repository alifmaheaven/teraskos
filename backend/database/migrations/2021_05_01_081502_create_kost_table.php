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
            $table->integer('kostID', true);
            $table->integer('MitraID')->index('mitraID');
            $table->integer('tipeID')->index('tipeID');
            $table->string('nama', 50);
            $table->text('deskripsi');
            $table->string('provinsi', 50);
            $table->string('kota', 50);
            $table->integer('kodepos');
            $table->text('alamat');
            $table->integer('isActive');
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
