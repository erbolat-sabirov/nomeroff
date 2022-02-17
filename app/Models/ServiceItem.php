<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\ServiceFilter;

/**
 * App\Models\ServiceItem
 *
 * @method static \Database\Factories\ServiceItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Price|null $price
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereUpdatedAt($value)
 */
class ServiceItem extends BaseModel
{

    public function queryFilterClass(): string
    {
        return ServiceFilter::class;
    }

    public function serviceCarTypes()
    {
        return $this->morphMany(ServiceCarType::class, 'serviceable')->with(['price', 'carType']);
    }

    public function services()
    {
        return $this->hasManyThrough(Service::class, ServiceId::class, 'service_item_id', 'id', 'id', 'service_id');
    }
}
