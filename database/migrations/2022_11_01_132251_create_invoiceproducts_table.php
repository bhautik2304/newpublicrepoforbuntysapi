<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceproducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade')->nullable(true);
            $table->foreignId('staff_id')->references('id')->on('staff')->onDelete('cascade')->nullable(true);
            $table->string('totale')->nullable(true);
            $table->string('discount')->nullable(true);
            $table->string('staffcomisan')->nullable(true);
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
        Schema::dropIfExists('invoiceproducts');
    }
}
