<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allusers', function (Blueprint $table) {
            $table->increments('alluserid');
            $table->string('alluserfirstname');
            $table->string('alluseremail')->unique(); //pourrait ne pas être unique dans people au cas ou un vendeur s'inscrit en tant que client avec le même mail
            $table->string('password');
            $table->integer('roleid');
            $table->integer('allusersellerid')->nullable();
            $table->integer('allusercustomerid')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            //$table->primary('alluserid');
            //$table->timestamps();
            $table->foreign('allusercustomerid')->references('customerid')->on('customers')->onDelete('cascade');
            $table->foreign('allusersellerid')->references('sellerid')->on('sellers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allusers');
    }
}
