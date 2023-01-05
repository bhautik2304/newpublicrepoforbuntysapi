<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferstypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerstypes', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2022_11_01_132151_create_offerstypes_table.php
            $table->string('name');
            $table->boolean('status')->default(true);
=======
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('expensetype_id')->references('id')->on('expencetypes')->onDelete('cascade');
            $table->string('name')->nullable(true);
            $table->string('expence_amount')->nullable(true);
            $table->enum('payment_method',['case','cheq','upi','card','bank_account'])->default('case');
            $table->string('vaoucher_code');
>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2022_11_13_011737_create_expens_table.php
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
        Schema::dropIfExists('offerstypes');
    }
}
