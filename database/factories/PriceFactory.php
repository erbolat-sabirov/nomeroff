<?php

namespace Database\Factories;

use App\Models\ServiceCarType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_car_type_id' => ServiceCarType::factory(),
            'amount' => $this->faker->randomDigit()
        ];
    }
}
