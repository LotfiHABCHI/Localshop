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
           // $table->id();
            $table->increments('customerid');
            $table->string('customerfirstname');
            $table->string('customerlastname');
            $table->string('customeremail')->unique();
            $table->string('password');
            $table->string('customerphone');
            $table->Integer('customernumstreet');
            $table->string('customernamestreet');
            $table->Integer('cp');
            $table->string('city');
            //$table->primary('customerid');
            $table->foreign('cp')->references('cp')->on('postcodes')->onDelete('cascade');
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
