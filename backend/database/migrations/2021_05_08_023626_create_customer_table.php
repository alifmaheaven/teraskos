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
            $table->string('nama', 50);
            $table->string('email', 50);
            $table->string('password', 15);
            $table->string('akun', 20);
            $table->string('noHP', 15);
            $table->string('kota', 20);
            $table->text('alamat');
            $table->string('lulusan', 50);
            $table->date('lahir');
            $table->string('upload', 100);
            $table->text('testimoni');
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
