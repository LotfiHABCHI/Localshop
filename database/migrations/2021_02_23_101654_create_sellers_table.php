<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id()->unsigned();  
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('tel');
            $table->string('password');
            $table->Integer('numstreet');
            $table->string('namestreet');
            $table->Integer('cp');
            $table->string('storename');
            $table->BigInteger('siren');
            $table->timestamps();
            $table->foreign('cp')->references('cp')->on('postcodes')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
