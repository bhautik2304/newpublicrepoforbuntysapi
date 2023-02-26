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
            $table->unsignedBigInteger('store_id')->nullable(true);
            $table->unsignedBigInteger('staff_id')->nullable(true);
            $table->string('name');
            $table->enum('role',["masteradmin",'store','staff','costumer','developer']);
            $table->string('email')->unique()->nullable();
            $table->string('mobaile')->unique()->nullable();
            $table->text('divice_id')->nullable();
            $table->text('password')->nullable();
            $table->string('otp')->nullable();
            $table->text('otptoken')->nullable();
            $table->text('sessiontoken')->nullable();
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
