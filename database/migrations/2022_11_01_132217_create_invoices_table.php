<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('invoicetypes_id')->references('id')->on('invoicetypes')->onDelete('cascade');
            $table->string('invoice_no')->nullable(true);
            $table->string('totale')->nullable(true);
            $table->string('discountied_amount')->nullable(true);
            $table->string('discount')->nullable(true);
            $table->string('reward_point_amount')->nullable(true);
            $table->string('reward_point')->nullable(true);
            $table->string('gst_amount')->nullable(true);
            $table->boolean('gst')->nullable(true);
            $table->string('reward_point_readeem')->nullable(true);
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
        Schema::dropIfExists('invoices');
    }
}
