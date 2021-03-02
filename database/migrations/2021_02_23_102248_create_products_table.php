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
            $table->id();
            //$table->bigInteger('id');  
            $table->string('name');
            //$table->string('slug');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->double('price');
            $table->bigInteger('catId')->unsigned();
            $table->timestamps();
            $table->foreign('catId')->references('id')->on('categories')->onDelete('cascade');

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
