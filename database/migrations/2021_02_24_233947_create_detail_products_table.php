<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_products', function (Blueprint $table) {
        //$table->id();
            //$table->bigIncrements('id');
           
            $table->unsignedBigInteger('productid');
            $table->unsignedBigInteger('sellerid'); 
           // $table->Integer('stock');
            $table->foreign('sellerid')->references('sellerid')->on('sellers')->onDelete('cascade');
            $table->foreign('productid')->references('productid')->on('products')->onDelete('cascade');
            $table->primary('productid');
        });
        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_products');
    }
}
