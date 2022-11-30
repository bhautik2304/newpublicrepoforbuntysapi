<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardpointwaletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewardpointwalets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->foreignId('stores_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('totale');
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
        Schema::dropIfExists('rewardpointwalets');
    }
}
