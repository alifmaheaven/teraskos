<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kost', function (Blueprint $table) {
            $table->foreign('MitraID', 'kost_ibfk_2')->references('MitraID')->on('mitrakos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('MitraID', 'kost_ibfk_3')->references('MitraID')->on('mitrakos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kost', function (Blueprint $table) {
            $table->dropForeign('kost_ibfk_2');
            $table->dropForeign('kost_ibfk_3');
        });
    }
}
