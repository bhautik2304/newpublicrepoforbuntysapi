<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicepaymentpartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicepaymentparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("invoice_id")->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignId("costomer_id")->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId("store_id")->references('id')->on('stores')->onDelete('cascade');
            $table->string('amount');
            $table->boolean('status')->default(false);
            $table->date('payment_date');
            $table->date('payid_date')->nullable(true);
            $table->time('payid_time')->nullable(true);
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
        Schema::dropIfExists('invoicepaymentparts');
    }
}
