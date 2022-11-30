<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade')->nullOnDelete();
            $table->foreignId('staffid')->references('id')->on('stores')->onDelete('cascade')->nullOnDelete();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobaile')->unique()->nullable();
            $table->text('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
