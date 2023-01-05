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
<<<<<<< HEAD
            $table->foreignId('store_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignId('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('serice_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('staff_id')->references('id')->on('staff')->onDelete('cascade');
=======
            $table->foreignId('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('staff_id')->references('id')->on('staff')->onDelete('cascade')->nullable(true);
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df
            $table->string('totale')->nullable(true);
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
