<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_type_id' => CarType::factory(),
            'car_brand_id' => CarBrand::factory(),
            'car_model_id' => CarModel::factory(),
            'number' => $this->faker->randomNumber(5),
            'zone' => 'ru',
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
        ];
    }
}
