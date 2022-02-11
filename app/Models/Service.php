<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\ServiceFilter;


/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ServiceItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Price|null $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Washing[] $washings
 * @property-read int|null $washings_count
 * @method static \Database\Factories\ServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends BaseModel
{
    public function queryFilterClass(): string
    {
        return ServiceFilter::class;
    }

    public function washings()
    {
        return $this->hasMany(Washing::class);
    }

    public function items()
    {
        return $this->hasManyThrough(ServiceItem::class, ServiceId::class, 'service_id', 'id', 'id', 'service_item_id');
    }

    public function price()
    {
        return $this->morphOne(Price::class, 'priceable');
    }
}