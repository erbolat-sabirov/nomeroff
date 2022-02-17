<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\CarFilter;

/**
 * App\Models\Car
 *
 * @property int $id
 * @property string $number
 * @property string $zone
 * @property string|null $phone
 * @property string|null $brand
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereZone($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CarService[] $carServices
 * @property-read int|null $car_services_count
 * @property-read \App\Models\CarModel|null $model
 * @property-read \App\Models\CarType|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Washing[] $washings
 * @property-read int|null $washings_count
 * @property int|null $car_type_id
 * @property int|null $car_brand_id
 * @property int|null $car_model_id
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDescription($value)
 * @property-read \App\Models\CarBrand|null $carBrand
 * @property-read \App\Models\CarModel|null $carModel
 * @property-read \App\Models\CarType|null $carType
 */
class Car extends BaseModel
{

    public function queryFilterClass(): string
    {
        return CarFilter::class;
    }

    public function washings()
    {
        return $this->hasMany(Washing::class);
    }

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}
