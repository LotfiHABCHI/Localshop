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
           // $table->id();
           $table->Integer('orderid')->unsigned();
            $table->Integer('productid')->unsigned(); 
            $table->Integer('orderproductquantity');
            $table->Integer('status');
           // $table->foreign('orderid')->references('orderid')->on('orders')->onDelete('cascade');
           $table->foreign('orderid')->references('orderid')->on('orders')->onDelete('cascade');
            
           $table->foreign('productid')->references('productid')->on('products')->onDelete('cascade');
            $table->primary(['orderid', 'productid']);
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
