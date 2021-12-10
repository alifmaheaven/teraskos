<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsikemitraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isikemitraan', function (Blueprint $table) {
            $table->integer('IsiPaketID', true);
            $table->string('layanan');
            $table->integer('nilai');
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
        Schema::dropIfExists('isikemitraan');
    }
}
