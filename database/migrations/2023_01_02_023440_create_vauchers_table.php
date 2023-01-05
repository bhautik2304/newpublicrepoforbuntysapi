<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVauchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vauchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vauchertypes_id')->references('id')->on('vauchertypes')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade')->nullable(true);
            $table->bigInteger('costumer_id')->nullable(true);
            $table->bigInteger('invoice_id')->nullable(true);
            // $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->text('uuid');
            $table->bigInteger('discount')->nullable(true);
            $table->bigInteger('amount')->nullable(true);
            $table->boolean('status')->default(true);
            $table->date('validto')->nullable(true);
            $table->date('validityend')->nullable(true);
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
        Schema::dropIfExists('vauchers');
    }
}
