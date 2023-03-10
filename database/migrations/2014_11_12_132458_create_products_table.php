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
            $table->foreignId('productcategury_id')->references('id')->on('producttypes')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->nullable(true);
            $table->enum('producttypes', ['insalon', 'selling']);
            $table->string('name')->nullable(true);
            $table->string('cost')->nullable(true);
            $table->string('price')->nullable(true);
            $table->string('per_unite_price')->nullable(true);
            $table->string('unite_in_product')->nullable(true);
            $table->string('special_price')->nullable(true);
            $table->boolean('is_special_price')->default(false);
            $table->text('uuid')->nullable(true);
            $table->boolean('status')->default(true);
            $table->string('discription')->nullable(true);
            $table->string('inventury_product_qty')->nullable(true);
            $table->string('inventury_product_alert')->nullable(true);
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
