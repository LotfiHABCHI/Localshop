<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
             
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->Integer('numstreet')->nullable();
            $table->string('namestreet')->nullable();
            $table->Integer('postcode')->nullable();
            $table->string('city')->nullable();
            $table->foreign('postcode')->references('cp')->on('postCodes')->onDelete('cascade');
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
        Schema::dropIfExists('customers');
    }
}
