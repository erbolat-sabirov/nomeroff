<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Service;
use App\Models\Washing;
use Illuminate\Database\Eloquent\Factories\Factory;

class WashingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = Washing::getStatusKeysList();
        $rand_key = array_rand($statuses);
        
        return [
            'car_id' => Car::factory(),
            'service_id' => Service::factory(),
            'status' => $statuses[$rand_key],
        ];
    }
}
