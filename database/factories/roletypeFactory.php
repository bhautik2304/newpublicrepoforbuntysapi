<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class roletypeFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayValues = ['admin', 'user', 'store'];
        return [
            //
            "name"=>$this->faker->randomElement(['admin', 'user'])
        ];
    }
}
