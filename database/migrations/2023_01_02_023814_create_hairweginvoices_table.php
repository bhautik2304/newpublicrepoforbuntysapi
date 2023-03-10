<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHairweginvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairweginvoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');

            $table->string('invoice_no')->nullable(true);
            $table->string('totale')->nullable(true);

            $table->boolean('discount_is')->default(false);
            $table->string('discounted_amount')->nullable(true);
            $table->string('discount')->nullable(true);

            $table->boolean('reward_point_readeem')->default(false);
            $table->string('reward_point_amount')->nullable(true);
            $table->string('reward_point')->nullable(true);

            $table->boolean('vaocher')->default(false);
            $table->string('vaocher_code')->nullable(true);
            $table->string('vaocher_amount')->nullable(true);

            $table->boolean('gst')->nullable(true);
            $table->string('gst_amount')->nullable(true);

            $table->boolean('paid')->default(true);

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
        Schema::dropIfExists('hairweginvoices');
    }
}
