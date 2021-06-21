<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('CustomID', true);
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('akun');
            $table->string('noHP');
            $table->string('kota');
            $table->text('alamat');
            $table->string('lulusan');
            $table->date('lahir');
            $table->text('testimoni')->nullable();
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
        Schema::dropIfExists('customer');
    }
}
