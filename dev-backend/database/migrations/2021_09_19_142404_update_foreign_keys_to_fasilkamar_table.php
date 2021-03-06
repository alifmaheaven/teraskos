<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeysToFasilkamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fasilkamar', function (Blueprint $table) {
            $table->dropForeign('fasilkamar_ibfk_1');
            $table->foreign('KamarID', 'fasilkamar_ibfk_1')->references('KamarID')->on('kamar')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
            //
        });
    }
}
