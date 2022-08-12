<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('main_image');
            $table->string('short_description_ar');
            $table->string('short_description_en');
            $table->string('price');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('size');
            $table->integer('category_id');
            $table->integer('product_num')->unique();
            $table->integer('available_count');
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
        Schema::dropIfExists('products');
    }
}
