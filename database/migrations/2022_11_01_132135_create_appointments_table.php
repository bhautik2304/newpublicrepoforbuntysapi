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
            $table->foreignId('serviceid')->references('id')->on('services')->onDelete('cascade')->nullable(true);
            $table->enum('status',[0,1,2,3])->nullable(true)->comment('0 = cancelled ,1= Confirm, 2=On TheWay,3= change sceduled');// 0 = cancelled ,1= Confirm, 2=On TheWay
            $table->string('serviceduration')->nullable(true);
            $table->enum('service_duration', ['noremember','+ 1 day','+ 2 day','+ 4 day','+ 5 day','+ 6 day','+ 1 week','+ 8 day','+ 9 day','+ 10 day','+ 15 day','+ 2 week','+ 3 day','+ 3 week','+ 4 week','+ 1 month','+ 2 month','+ 4 month','+ 5 month','+ 6 month','+ 7 month','+ 9 month','+ 10 month','+ 11 month','+ 12 month',
            ])->default('noremember');
            $table->date('appoitment_date')->nullable(true);
            $table->time('appoitment_time')->nullable(true);
            $table->time('appoitment_end_time')->nullable(true);
            $table->boolean('reminder_by_system')->default(false);
            $table->boolean('reminder_by_user')->default(false);
            $table->boolean('strict_appointment')->default(false);
            $table->time('reminder_time_system')->nullable(true);
            $table->time('reminder_time_user')->nullable(true);
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
