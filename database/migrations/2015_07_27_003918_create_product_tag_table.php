<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_tag', function (Blueprint $table) {
            
        	$table->increments('id');
        	
        	$table->integer('product_id')->unsigned();
        	$table->foreign('product_id')->references('id')->on('products');
        	
        	$table->integer('tag_id')->unsigned();
        	$table->foreign('tag_id')->references('id')->on('tags');
        	
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
        Schema::drop('products_tags');
    }
}
