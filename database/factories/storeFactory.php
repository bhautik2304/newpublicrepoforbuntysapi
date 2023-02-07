<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class storeFactory extends Factory
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
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'mobaile'=>$this->faker->phoneNumber(),
            'password'=>Hash::make("1234567890")
        ];
    }
}
