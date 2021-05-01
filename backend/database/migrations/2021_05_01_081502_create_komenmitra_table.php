<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenmitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komenmitra', function (Blueprint $table) {
            $table->integer('ArtikelID')->index('ArtikelID');
            $table->integer('MitraID')->index('MitraID');
            $table->text('komen');
            $table->date('tgl');
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
        Schema::dropIfExists('komenmitra');
    }
}
