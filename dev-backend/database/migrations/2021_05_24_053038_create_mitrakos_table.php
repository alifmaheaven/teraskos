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
            $table->integer('MitraID', true);
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('noHP');
            $table->integer('usia');
            $table->string('pekerjaan');
            $table->string('institusi')->nullable();
            $table->text('testimoni')->nullable();
            $table->integer('PaketID')->index('paketID');
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
        Schema::dropIfExists('mitrakos');
    }
}
