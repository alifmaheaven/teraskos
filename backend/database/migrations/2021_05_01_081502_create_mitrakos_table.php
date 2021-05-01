<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrakosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitrakos', function (Blueprint $table) {
            $table->integer('MitraID')->primary();
            $table->string('nama', 50);
            $table->string('email', 50);
            $table->string('password', 15);
            $table->string('noHP', 15);
            $table->integer('usia');
            $table->string('pekerjaan', 50);
            $table->string('institusi', 50);
            $table->text('testimoni');
            $table->integer('paketID')->index('paketID');
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
        Schema::dropIfExists('mitrakos');
    }
}
