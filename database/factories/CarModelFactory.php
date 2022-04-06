<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\CarType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(15),
            'car_brand_id' => CarBrand::factory(),
            'car_type_id' => CarType::factory()
        ];
    }
}
