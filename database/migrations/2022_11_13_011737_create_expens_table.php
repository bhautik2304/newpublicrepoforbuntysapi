<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('expensetype_id')->references('id')->on('expencetypes')->onDelete('cascade');
            $table->string('name')->nullable(true);
            $table->string('expence_amount')->nullable(true);
            $table->enum('payment_method',['case','cheq','upi','card','bank_account'])->default('case');
            $table->string('vaoucher_code');
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
        Schema::dropIfExists('expens');
    }
}
