<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\CarModelFilter;

/**
 * App\Models\CarModel
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarModelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel query()
 * @mixin \Eloquent
 */
class CarModel extends BaseModel
{

    public function queryFilterClass(): string
    {
        return CarModelFilter::class;
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
