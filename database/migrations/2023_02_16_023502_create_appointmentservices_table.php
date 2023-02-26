<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointmentservices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointmentid')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('staffid')->references('id')->on('staff')->onDelete('cascade');
            $table->foreignId('serviceid')->references('id')->on('services')->onDelete('cascade')->nullable(true);
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
        Schema::dropIfExists('appointmentservices');
    }
}
