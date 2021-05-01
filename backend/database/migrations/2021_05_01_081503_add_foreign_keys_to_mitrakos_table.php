<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMitrakosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mitrakos', function (Blueprint $table) {
            $table->foreign('paketID', 'mitrakos_ibfk_1')->references('paketID')->on('paket')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mitrakos', function (Blueprint $table) {
            $table->dropForeign('mitrakos_ibfk_1');
        });
    }
}
