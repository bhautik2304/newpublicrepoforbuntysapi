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
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('store_email')->nullable();
            $table->string('mobaile')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('opentime')->nullable();
            $table->string('closetime')->nullable();
            $table->string('address')->nullable();
            $table->string('pin')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('locality')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('whatsapp_chat_link')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->text('map')->nullable();

            $table->boolean('session')->default(false);
            $table->time('session_start')->default(false);
            $table->time('session_end')->default(false);
            $table->text('password')->nullable();

            $table->text('divice_id')->nullable();
            $table->text('resetpassword_token')->nullable();
            $table->text('session_token')->nullable();
            $table->string('otp')->nullable();

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
