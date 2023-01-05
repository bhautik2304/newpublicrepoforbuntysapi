<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewardpoints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costomer_id')->references('id')->on('costumers')->onDelete('cascade');
            $table->string('reward_point');
            $table->string('reward_amount');
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
        Schema::dropIfExists('rewardpoints');
    }
}
