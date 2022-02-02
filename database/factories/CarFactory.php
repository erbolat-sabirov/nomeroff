<?php

namespace Database\Factories;

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
            'number' => $this->faker->randomNumber(5),
            'zone' => 'ru',
            'phone' => $this->faker->phoneNumber(),
            'brand' => $this->faker->name(),
            'name' => $this->faker->lastName(),
        ];
    }
}
