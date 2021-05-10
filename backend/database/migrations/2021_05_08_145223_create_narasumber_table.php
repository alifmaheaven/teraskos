<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarasumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narasumber', function (Blueprint $table) {
            $table->integer('narasumberID', true);
            $table->string('nama', 50);
            $table->string('email', 100);
            $table->string('noHP', 15);
            $table->string('pekerjaan', 50);
            $table->string('institusi', 50);
            $table->text('alasan');
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
        Schema::dropIfExists('narasumber');
    }
}
