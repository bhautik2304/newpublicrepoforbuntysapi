<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorenotyficationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storenotyfications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->enum('notificaton_type',['sms','mail','whatsapp'])->nullable();
            $table->string('notificaton_name')->nullable();
            $table->unsignedBigInteger('categury_id')->nullable();
            $table->text('notificaton_msg')->nullable();
            $table->boolean('notificaton_status')->nullable();
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
        Schema::dropIfExists('storenotyfications');
    }
}
