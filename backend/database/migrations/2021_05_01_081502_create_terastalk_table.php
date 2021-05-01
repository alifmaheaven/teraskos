<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerastalkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terastalk', function (Blueprint $table) {
            $table->integer('talkID', true);
            $table->string('judul', 50);
            $table->text('deskripsi');
            $table->date('tgl');
            $table->string('narasumber', 50);
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
        Schema::dropIfExists('terastalk');
    }
}
