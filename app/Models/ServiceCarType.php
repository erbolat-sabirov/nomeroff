<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\ServiceCarTypeFilter;

/**
 * App\Models\ServiceCarType
 *
 * @property int $id
 * @property int $car_type_id
 * @property int $serviceable_id
 * @property string $serviceable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CarType $carType
 * @property-read \App\Models\Price|null $price
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $serviceable
 * @method static \Database\Factories\ServiceCarTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType whereCarTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType whereServiceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType whereServiceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceCarType extends BaseModel
{

    public function queryFilterClass(): string
    {
        return ServiceCarTypeFilter::class;
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function serviceable()
    {
        return $this->morphTo();
    }

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }
}
