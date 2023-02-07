<?php

namespace Database\Factories;

use App\Models\servicetype;
use Illuminate\Database\Eloquent\Factories\Factory;

class serviceFactory extends Factory
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
            "name" => $this->faker->titleMale(),
            "servicetypeid" => servicetype::inRandomOrder()->first(),
            "price" => rand(000,999)
        ];
    }
}
