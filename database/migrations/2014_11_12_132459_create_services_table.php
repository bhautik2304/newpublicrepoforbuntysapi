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
            $table->unsignedBigInteger('product_id')->default(1);
            $table->unsignedBigInteger('servis_cost')->default(0);
            $table->string('name', 100)->nullable()->default('text');
            $table->string('price', 100)->nullable()->default(0);
            $table->string('offer_price', 100)->nullable()->default(0);
            $table->string('minprice', 100)->nullable()->default(0);
            $table->enum('service_duration', ['noduration','+ 10 minute','+ 15 minute','+ 20 minute','+ 30 hour','+ 45 minute','+ 1 hour','+ 2 hour','+ 3 hour','+ 4 hour','+ 5 hour','+ 6 hour','+ 7 hour','+ 8 hour','+ 9 hour','+ 10 hour','+ 11 hour','+ 12 hour','+ 90 minute','+ 150 minute','+ 210 minute','+ 270 minute'])->default('noduration');
            $table->enum('service_remember', ['noremember','+ 1 day','+ 2 day','+ 4 day','+ 5 day','+ 6 day','+ 1 week','+ 8 day','+ 9 day','+ 10 day','+ 15 day','+ 2 week','+ 3 day','+ 3 week','+ 4 week','+ 1 month','+ 2 month','+ 4 month','+ 5 month','+ 6 month','+ 7 month','+ 9 month','+ 10 month','+ 11 month','+ 12 month',
                ])->default('noremember');
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
        Schema::dropIfExists('services');
    }
}
