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
            $table->text('invoice_uuid')->nullable(true);
            $table->text('invoice_no')->nullable(true);

            $table->string('totale')->nullable(true);

            $table->enum("benifits", ["discount","rewordpoints","voucher","costomer_voucher","offers","nobenifits"])->default("nobenifits");

            $table->boolean('discount_is')->default(false);
            $table->string('discount')->nullable(true);
            $table->string('discounted_amount')->nullable(true);

            $table->boolean('reward_point_readeem')->default(false);
            $table->string('reward_point')->nullable(true);
            $table->string('reward_point_amount')->nullable(true);

            $table->boolean('vaocher')->default(false);
            $table->string('vaocher_code')->nullable(true);
            $table->string('vaocher_amount')->nullable(true);

            $table->boolean('costomer_voucher')->default(false);
            $table->string('costomer_voucher_code')->nullable(true);
            $table->string('costomer_voucher_amount')->nullable(true);

            $table->boolean('offers')->default(false);
            $table->string('offers_code')->nullable(true);
            $table->string('offers_amount')->nullable(true);

            $table->boolean('gst')->nullable(true);
            $table->string('gst_totale')->nullable(true);
            $table->string('gst_amount')->nullable(true);

            $table->enum('invoice_payment_type',["paid","part","emi"])->default("paid");
            $table->string('totale_emi')->nullable(true);
            $table->string('totale_part')->nullable(true);

            $table->enum('invoice_payment_mode',["online","case","card"])->default("case");
            $table->text('transaction_id')->nullable(1);
            $table->enum('invoice_online_payment_app',["paytm","gpay","phonepay","whatsapppay","case"])->default("case");

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
