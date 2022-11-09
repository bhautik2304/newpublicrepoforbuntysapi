<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('stafftypesid')->references('id')->on('stores')->onDelete('cascade');
            $table->string('name');
            $table->string('lastname');
            $table->boolean('gender')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->text('img')->nullable();
            $table->text('designation')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobaile')->unique()->nullable();
            $table->string('whatsapp')->nullable();
            $table->time('workstarttime')->nullable();
            $table->time('workemdtime')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
