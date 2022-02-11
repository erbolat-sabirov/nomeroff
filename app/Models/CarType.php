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
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereUpdatedAt($value)
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

    public function price()
    {
        return $this->morphOne(Price::class, 'priceable');
    }
}
