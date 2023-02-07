<?php

namespace Database\Seeders;

use App\Models\{costomercategury, costumer, costumertype, product, producttypes, roletype, service, servicetype, staff, stafftype, store,User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        store::factory()->count(4)->create();

        costumertype::factory()->count(3)->create();
        roletype::factory()->count(3)->create();
        servicetype::factory()->count(4)->create();
        producttypes::factory()->count(4)->create();
        stafftype::factory()->count(2)->create();


        User::factory()->count(4)->create();
        service::factory()->count(4)->create();
        staff::factory()->count(4)->create();
        costumer::factory()->count(4)->create();
        product::factory()->count(20)->create();

    }
}
