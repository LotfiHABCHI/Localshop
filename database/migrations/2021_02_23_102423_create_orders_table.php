<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            //$table->id();
            $table->increments('orderid');
            $table->datetime('orderdate');
            $table->Integer('orderquantity'); 
            $table->double('orderprice');
            $table->Integer('customerid')->unsigned(); 
            $table->timestamps();
            //$table->primary('orderid');
            $table->foreign('customerid')->references('customerid')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
