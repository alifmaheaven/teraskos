<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('type_id');
            $table->string('name', 150);
            $table->text('description');
            $table->bigInteger('nominal');
            $table->text('foto')->nullable();
            $table->date('date')->useCurrent();
            $table->boolean('is_active')->default('1');
            $table->boolean('is_internal')->default('1');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('account_id')->references('id')->on('account');
            $table->foreign('type_id')->references('id')->on('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction');
    }
}
