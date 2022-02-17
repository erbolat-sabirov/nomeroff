<?php

namespace Database\Factories;

use App\Models\CarType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCarTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_type_id' => CarType::inRandomOrder()->first()->id,
            'serviceable_id' => Service::inRandomOrder()->first()->id,
            'serviceable_type' => Service::class
        ];
    }
}
