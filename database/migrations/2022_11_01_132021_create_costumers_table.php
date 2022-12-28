<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('costomertypeid')->references('id')->on('costumertypes')->onDelete('cascade')->default(1);
            $table->string('name');
            $table->string('last_name')->nullable(true);
            $table->text('img')->nullable(true);
            $table->text('city')->nullable(true);
            $table->string('email')->unique()->nullable(true);
            $table->string('mobaile')->unique()->nullable(true);
            $table->string('whatsapp')->nullable(true);
            $table->boolean('gender')->default(false);
            $table->date('DOB')->nullable(true)->default(null);
            $table->date('Anniversary')->nullable(true)->default(null);
            $table->timestamp('email_verified_at')->nullable(true);
            $table->timestamp('mobaile_verified_at')->nullable(true);
            $table->timestamp('whatsapp_verified_at')->nullable(true);
            $table->boolean('email_verified_status')->default(false);
            $table->boolean('mobaile_verified_status')->default(false);
            $table->boolean('whatsapp_verified_status')->default(false);
            $table->boolean('email_notyfication_status')->default(true);
            $table->boolean('mobaile_notyfication_status')->default(true);
            $table->boolean('whatsapp_notyfication_status')->default(false);
            $table->boolean('promo_sms')->default(false);
            $table->text('costomer_notes')->nullable(true);
            $table->text('address')->nullable(true);
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
        Schema::dropIfExists('costumers');
    }
}
