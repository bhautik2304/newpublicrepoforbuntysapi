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
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('product_categury_id')->references('id')->on('producttypes')->onDelete('cascade');
            $table->string('name')->nullable(true);
            $table->string('price')->nullable(true);
            $table->text('uuid')->nullable(true);
            $table->boolean('status')->default(true);
            $table->string('discription')->nullable(true);
            $table->string('expiry_date')->nullable(true);
            $table->string('menu_date')->nullable(true);
            $table->string('qty')->nullable(true);
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
