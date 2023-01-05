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
            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade');
<<<<<<< HEAD
            // $table->foreignId('staffid')->references('id')->on('staff')->onDelete('cascade');
=======
            $table->foreignId('role_id')->references('id')->on('roletypes')->onDelete('cascade');
            $table->foreignId('staff_id')->references('id')->on('staff')->onDelete('cascade')->nullable();
>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df
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
