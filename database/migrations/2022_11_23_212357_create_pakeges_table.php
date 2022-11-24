<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakeges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkg_id')->references('id')->on('invoices')->onDelete('cascade')->nullable(true);
            $table->foreignId('serice_id')->references('id')->on('services')->onDelete('cascade')->nullable(true);
            $table->foreignId('store_id')->references('id')->on('invoices')->onDelete('stores')->nullable(true);
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade')->nullable(true);
            $table->foreignId('staff_id')->references('id')->on('staff')->onDelete('cascade')->nullable(true);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('pakeges');
    }
}
