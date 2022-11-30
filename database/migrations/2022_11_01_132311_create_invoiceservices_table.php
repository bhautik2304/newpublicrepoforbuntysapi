<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceservices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('invoices')->onDelete('stores');
            $table->foreignId('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('serice_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('staff_id')->references('id')->on('staff')->onDelete('cascade');
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
        Schema::dropIfExists('invoiceservices');
    }
}
