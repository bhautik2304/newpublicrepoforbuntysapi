<?php

namespace Database\Factories;

use App\Models\{stafftype, store};
use Illuminate\Database\Eloquent\Factories\Factory;

class staffFactory extends Factory
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
            "storeid" => store::inRandomOrder()->first(),
            "stafftypesid" => stafftype::inRandomOrder()->first(),
            "name" => $this->faker->name(),
            "lastname" => $this->faker->lastName(),
            "firstname" => $this->faker->firstName(),
            "email" => $this->faker->unique()->email(),
            "mobaile" => $no = $this->faker->unique()->phoneNumber(),
            "whatsapp_mobaile" => $no,
            "sallery" => $this->faker->randomElements(["100000", "15000", "20000"]),
            "product_sale" => 5,
            "service_sale" => 10,
            "service_exc" => 8,
            "pkg_sale" => 7,
        ];
    }
}
