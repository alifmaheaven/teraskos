<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIsikemitraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isikemitraan', function (Blueprint $table) {
            $table->foreign('PaketID', 'isikemitraan_ibfk_1')->references('PaketID')->on('paket')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isikemitraan', function (Blueprint $table) {
            $table->dropForeign('isikemitraan_ibfk_1');
        });
    }
}
