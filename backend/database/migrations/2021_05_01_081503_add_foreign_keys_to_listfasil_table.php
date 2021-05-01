<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToListfasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listfasil', function (Blueprint $table) {
            $table->foreign('kostID', 'listfasil_ibfk_1')->references('kostID')->on('kost')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('fasilitasID', 'listfasil_ibfk_2')->references('fasilitasID')->on('fasilitas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listfasil', function (Blueprint $table) {
            $table->dropForeign('listfasil_ibfk_1');
            $table->dropForeign('listfasil_ibfk_2');
        });
    }
}
