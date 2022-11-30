<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('staffid')->references('id')->on('staff')->onDelete('cascade');
            $table->foreignId('serviceid')->references('id')->on('services')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->enum('appoitmentstatus',[0,1,2,3])->default(1);
            $table->boolean('reminderstatus_system')->default(null);
            $table->boolean('reminderstatus_stuff')->default(null);
            $table->text('remindermesasg')->default(null);
            $table->time('remindertime_system')->default(null);
            $table->time('remindertime_staff')->default(null);
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
        Schema::dropIfExists('appointments');
    }
}
