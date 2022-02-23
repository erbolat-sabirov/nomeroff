<?php

namespace Database\Factories;

use App\Models\ServiceItem;
use App\Models\Washing;
use Illuminate\Database\Eloquent\Factories\Factory;

class WashingServiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'washing_id' => Washing::inRandomOrder()->first()->id,
            'service_item_id' => ServiceItem::factory(),
        ];
    }
}
