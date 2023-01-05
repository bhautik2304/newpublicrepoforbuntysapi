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
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('staffid')->references('id')->on('staff')->onDelete('cascade');
<<<<<<< HEAD
            $table->foreignId('serviceid')->references('id')->on('services')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->enum('appoitmentstatus',[0,1,2,3])->default(1);
            $table->boolean('reminderstatus_system')->default(null);
            $table->boolean('reminderstatus_stuff')->default(null);
            $table->text('remindermesasg')->default(null);
            $table->time('remindertime_system')->default(null);
            $table->time('remindertime_staff')->default(null);
=======
            $table->foreignId('serviceid')->references('id')->on('services')->onDelete('cascade')->nullable(true);
            $table->enum('status',[0,1,2,3])->nullable(true)->comment('0 = cancelled ,1= Confirm, 2=On TheWay,3= change sceduled');// 0 = cancelled ,1= Confirm, 2=On TheWay
            $table->string('serviceduration')->nullable(true);
            $table->date('appoitment_date')->nullable(true);
            $table->time('appoitment_time')->nullable(true);
            $table->time('appoitment_end_time')->nullable(true);
            $table->boolean('reminder_by_system')->default(false);
            $table->boolean('reminder_by_user')->default(false);
            $table->time('reminder_time_system')->nullable(true);
            $table->time('reminder_time_user')->nullable(true);
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
        Schema::dropIfExists('appointments');
    }
}
