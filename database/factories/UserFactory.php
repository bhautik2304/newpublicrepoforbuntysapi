<?php

namespace Database\Factories;

use App\Models\role;
use App\Models\roletype;
use App\Models\store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'storeid' => store::inRandomOrder()->first(),
            'role_id' => roletype::inRandomOrder()->first(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobaile' => Str::random(10), // password
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
