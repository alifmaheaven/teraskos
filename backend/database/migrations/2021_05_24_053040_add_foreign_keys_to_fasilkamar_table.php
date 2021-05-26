<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFasilkamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fasilkamar', function (Blueprint $table) {
            $table->foreign('KamarID', 'fasilkamar_ibfk_1')->references('MitraID')->on('mitrakos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fasilkamar', function (Blueprint $table) {
            $table->dropForeign('fasilkamar_ibfk_1');
        });
    }
}
