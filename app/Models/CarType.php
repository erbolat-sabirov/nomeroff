<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\CarTypeFilter;

/**
 * App\Models\CarType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarType query()
 * @mixin \Eloquent
 */
class CarType extends BaseModel
{

    public function queryFilterClass(): string
    {
        return CarTypeFilter::class;
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
