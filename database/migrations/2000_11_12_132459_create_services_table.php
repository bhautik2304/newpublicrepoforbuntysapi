<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicetypeid')->references('id')->on('servicestypes')->onDelete('cascade');
            $table->string('name', 100)->nullable()->default('text');
            $table->string('price', 100)->nullable()->default(0);
            $table->string('minprice', 100)->nullable()->default(0);
<<<<<<< HEAD
            $table->string('service_time', 100)->nullable();
            $table->string('service_duration', 100)->nullable();
=======
            $table->string('service_duration', 100)->nullable()->default(0);
            $table->string('service_time', 100)->nullable()->default(0);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('services');
    }
}
