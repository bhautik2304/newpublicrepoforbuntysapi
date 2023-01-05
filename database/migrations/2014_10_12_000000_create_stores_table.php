<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('avatar')->nullable();
            $table->text('logo')->nullable();
            $table->string('email')->nullable();
            $table->string('mobaile')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->text('password')->nullable();
            $table->string('opentime')->nullable();
            $table->string('closetime')->nullable();
            $table->string('address')->nullable();
            $table->string('pin')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('gmail_id')->nullable();
            $table->text('map')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
