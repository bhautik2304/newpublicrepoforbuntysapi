<?php

namespace Database\Factories;

use App\Models\costumertype;
use App\Models\store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class costumerFactory extends Factory
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
            "name"=>$this->faker->name(),
            "storeid"=>store::inRandomOrder()->first(),
            "costocateguryid"=>costumertype::inRandomOrder()->first(),
            // "name"=>$this->faker,
            "email"=>$this->faker->email(),
            "mobaile"=>$this->faker->phoneNumber(),
            "password"=>Hash::make("1230456"),
        ];
    }
}
