<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2022_11_23_212552_create_roles_table.php
class CreateRolesTable extends Migration
========
class CreateHairwegmesursTable extends Migration
>>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2023_01_02_023827_create_hairwegmesurs_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2022_11_23_212552_create_roles_table.php
        Schema::create('roles', function (Blueprint $table) {
========
        Schema::create('hairwegmesurs', function (Blueprint $table) {
>>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2023_01_02_023827_create_hairwegmesurs_table.php
            $table->id();
            $table->string('name');
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
<<<<<<<< HEAD:database/migrations/2022_11_23_212552_create_roles_table.php
        Schema::dropIfExists('roles');
========
        Schema::dropIfExists('hairwegmesurs');
>>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df:database/migrations/2023_01_02_023827_create_hairwegmesurs_table.php
    }
}
