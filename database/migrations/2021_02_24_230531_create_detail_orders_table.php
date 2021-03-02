<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  //!!!!!!! LA BONNE TABLE PIVOT !!!!!!!!!!//
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->id();
            $table->BigInteger('productId')->unsigned(); 
            $table->BigInteger('orderId')->unsigned(); 
          
            $table->Integer('quantity');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['orderId', 'productId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_orders');
    }
}
