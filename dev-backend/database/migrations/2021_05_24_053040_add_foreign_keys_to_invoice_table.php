<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->foreign('CustomID', 'invoice_ibfk_1')->references('CustomID')->on('customer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('HargaID', 'invoice_ibfk_2')->references('HargaID')->on('listharga')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('JenisID', 'invoice_ibfk_3')->references('JenisID')->on('pembayaran')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->dropForeign('invoice_ibfk_1');
            $table->dropForeign('invoice_ibfk_2');
            $table->dropForeign('invoice_ibfk_3');
        });
    }
}
