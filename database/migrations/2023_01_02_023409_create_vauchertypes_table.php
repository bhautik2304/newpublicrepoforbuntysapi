<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2022_11_23_212615_create_roleaccesses_table.php
class CreateRoleaccessesTable extends Migration
========
class CreateVauchertypesTable extends Migration
>>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2023_01_02_023409_create_vauchertypes_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2022_11_23_212615_create_roleaccesses_table.php
        Schema::create('roleaccesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roleid')->references('id')->on('roles')->onDelete('cascade');
            $table->string('access');
========
        Schema::create('vauchertypes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->boolean('status')->default(true);
>>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2023_01_02_023409_create_vauchertypes_table.php
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
<<<<<<<< HEAD:database/migrations/2022_11_23_212615_create_roleaccesses_table.php
        Schema::dropIfExists('roleaccesses');
========
        Schema::dropIfExists('vauchertypes');
>>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2023_01_02_023409_create_vauchertypes_table.php
    }
}
