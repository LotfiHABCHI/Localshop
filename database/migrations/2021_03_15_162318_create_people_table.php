<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email')->unique(); //pourrait ne pas être unique dans people au cas ou un vendeur s'inscrit en tant que client avec le même mail
            $table->string('password');
            $table->integer('customerId')->nullable();
            $table->integer('sellerId')->nullable();
            $table->integer('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('sellerId')->references('id')->on('sellers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
