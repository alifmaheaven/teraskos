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
            $table->string('InvoiceID')->primary();
            $table->integer('CustomID')->index('CustomID');
            $table->integer('HargaID')->index('HargaID');
            $table->string('invoice');
            $table->date('dibuat');
            $table->integer('bayar');
            $table->integer('keuntungan');
            $table->integer('JenisID')->index('JenisID');
            $table->string('terbilang');
            $table->string('status');
            $table->string('upload');
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
        Schema::dropIfExists('invoice');
    }
}
