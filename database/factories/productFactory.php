<?php

namespace Database\Factories;

use App\Models\producttypes;
use App\Models\store;
use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "store_id" > store::inRandomOrder()->first(),
            "product_categury_id" >producttypes::inRandomOrder()->first(),
            "name" > $this->faker->name(),
            "price" > rand(000,999),
            "uuid" > rand(0000000000,9999999999),
            "status" > 1,
            "discription" > $this->faker->paragraph(20),
            "expiry_date" > $this->faker->dateTimeBetween("-1 years","+1 years"),
            "menu_date" > $this->faker->dateTimeBetween("-1 years","+1 years"),
            "qty" > rand(000,999),
        ];
    }
}
