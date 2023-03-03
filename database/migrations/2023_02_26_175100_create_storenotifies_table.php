<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorenotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storenotifies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->enum('user_role', ["masteradmin", 'store', 'staff', 'costumer', 'developer']);
            $table->enum('notification_for', ["masteradmin", 'store', 'staff', 'costumer', 'developer']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('titel')->nullable();
            $table->text('msg')->nullable();
            $table->boolean('read')->default(true);
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
        Schema::dropIfExists('storenotifies');
    }
}
