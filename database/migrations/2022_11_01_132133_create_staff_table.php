<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();

            $table->foreignId('storeid')->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('stafftypesid')->references('id')->on('stores')->onDelete('cascade');

            $table->string('name');
            $table->string('lastname');
            $table->string('firstname');

            $table->string('email');
            $table->string('mobaile');
            $table->string('whatsapp_mobaile');

            $table->boolean('email_veryfy')->default(true);
            $table->boolean('mobaile_veryfy')->default(true);
            $table->boolean('whatsapp_mobaile_veryfy')->default(true);

            $table->boolean('leave')->default(false);

            $table->date('birthday')->nullable();
            $table->date('annyversy_day')->nullable();

            $table->text('profile_img')->nullable();
            $table->boolean('gender')->nullable();
            $table->boolean('maritial_status')->nullable();


            $table->string('city')->nullable();
            $table->string('state')->unique()->nullable();
            $table->string('pin')->unique()->nullable();
            $table->text('per_add')->nullable();
            $table->text('res_add')->nullable();

            $table->string('job_starting_time')->nullable();
            $table->string('job_hours')->unique()->nullable();
            $table->string('weekend')->unique()->nullable();

            $table->string('sallery')->nullable();
            $table->string('product_sale')->nullable();
            $table->string('service_sale')->nullable();
            $table->string('service_exc')->nullable();
            $table->string('pkg_sale')->nullable();

            $table->text('addhar_doc_url')->nullable();
            $table->text('pan_doc_url')->nullable();
            $table->text('drl_doc_url')->nullable();//driving lincence

            $table->text('addhar_no')->nullable();
            $table->text('pan_no')->nullable();
            $table->text('drl_no')->nullable();//driving lincence

            $table->boolean('insuriuns')->default(true);
            $table->boolean('mediclaim')->default(true);
            $table->boolean('pf')->default(true);

            $table->text('bank_account_no')->nullable();
            $table->text('bank_account_ifc')->nullable();
            $table->text('bank_name')->nullable();
            $table->text('bank_account_holder_name')->nullable();
            $table->text('bank_account_doc')->nullable();

            $table->boolean('status')->nullable()->default(true);
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
        Schema::dropIfExists('staff');
    }
}
