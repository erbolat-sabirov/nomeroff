<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(15)
        ];
    }
}
