<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->string('invoiceID', 100)->primary();
            $table->integer('CustomID')->index('CustomID');
            $table->integer('KostID')->index('KostID');
            $table->date('checkIn');
            $table->date('checkOut');
            $table->integer('bayar');
            $table->integer('keuntungan');
            $table->integer('jenisID')->index('jenisID');
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
        Schema::dropIfExists('invoice');
    }
}
