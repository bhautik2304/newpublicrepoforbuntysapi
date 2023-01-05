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
<<<<<<< HEAD
            $table->foreignId('stores_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('invoicetypes_id')->references('id')->on('invoicetypes')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            // $table->foreignId('invoicetypes_id')->references('id')->on('invoicetypes')->onDelete('cascade');
            // $table->foreignId('')->references('id')->on('costumers')->onDelete('cascade');
            $table->text('invoice_no')->nullable(true);
            $table->enum('paymentmode',[1,2,3]);//1= case,2=upi,3=card
=======
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('invoicetypes_id')->references('id')->on('invoicetypes')->onDelete('cascade');

            $table->string('invoice_no')->nullable(true);

>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df
            $table->string('totale')->nullable(true);

            $table->boolean('discount_is')->default(false);
            $table->string('discounted_amount')->nullable(true);
            $table->string('discount')->nullable(true);
<<<<<<< HEAD
            $table->string('disc_amount')->nullable(true);
            $table->string('gst_amount')->nullable(true);
            $table->string('reward_point')->nullable(true);
            $table->foreignId('offers_id')->references('id')->on('offers')->onDelete('cascade');
            $table->string('offers_due_amount')->nullable(true);
            $table->boolean('gst')->default(false);
            $table->boolean('status')->default(true);
=======

            $table->boolean('reward_point_readeem')->default(false);
            $table->string('reward_point_amount')->nullable(true);
            $table->string('reward_point')->nullable(true);

            $table->boolean('vaocher')->default(false);
            $table->string('vaocher_code')->nullable(true);
            $table->string('vaocher_amount')->nullable(true);

            $table->boolean('gst')->nullable(true);
            $table->string('gst_amount')->nullable(true);

            $table->boolean('paid')->default(true);

>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df
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
