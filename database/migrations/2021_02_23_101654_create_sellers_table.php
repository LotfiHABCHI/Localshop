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
           // $table->id()->unsigned();  
            $table->increments('sellerid');
            $table->string('sellerfirstname');
            $table->string('sellerlastname');
            $table->string('selleremail')->unique();
            $table->string('password');
            $table->string('sellerphone');
            $table->BigInteger('siret');
            $table->Integer('sellernumstreet');
            $table->string('sellernamestreet');
            $table->Integer('cp');
            $table->string('city');
            $table->string('storename');
            $table->string('sellerimage');
            $table->string('sellerdescription')->nullable();
            $table->timestamps();
            //$table->primary('sellerid');
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
