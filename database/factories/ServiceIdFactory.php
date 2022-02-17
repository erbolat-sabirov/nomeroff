<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceIdFactory  extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id' => Service::inRandomOrder()->first()->id,
            'service_item_id' => ServiceItem::inRandomOrder()->first()->id
        ];
    }
}
