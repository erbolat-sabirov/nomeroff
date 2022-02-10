<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\CarBrandFilter;

/**
 * App\Models\CarBrand
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarBrandFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand query()
 * @mixin \Eloquent
 */
class CarBrand extends BaseModel
{

    public function queryFilterClass(): string
    {
        return CarBrandFilter::class;
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
