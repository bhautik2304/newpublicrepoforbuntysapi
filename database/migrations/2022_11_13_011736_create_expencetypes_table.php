<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpencetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expencetypes', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2022_11_13_190416_create_expencetypes_table.php
            $table->foreignId('storeId')->references('id')->on('stores')->onDelete('cascade');
            $table->string('name');
            $table->string('amount');
=======
            $table->string('name');
            $table->boolean('status')->default(true);
>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2022_11_13_011736_create_expencetypes_table.php
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
        Schema::dropIfExists('expencetypes');
    }
}
