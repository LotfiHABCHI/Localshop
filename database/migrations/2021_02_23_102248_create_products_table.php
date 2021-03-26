<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //$table->id();
            $table->increments('productid');
            $table->string('productname');
            $table->text('productimage');
            $table->text('productinfo');
            $table->double('productprice');
            $table->Integer('categoryid');
            $table->Integer('productquantity');
            $table->timestamps();
            //$table->primary('productid');
            $table->foreign('categoryid')->references('categoryid')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
