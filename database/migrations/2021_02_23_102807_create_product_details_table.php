<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  // TABLE PIVOT A REFAIRE COMME detail_orders // detail_products //
    {
        Schema::create('product_details', function (Blueprint $table) {
            //$table->id();
            //$table->bigIncrements('id');
           
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('sellerId'); 
            $table->Integer('stock');
            $table->foreign('sellerId')->references('id')->on('sellers')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['sellerId', 'productId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
