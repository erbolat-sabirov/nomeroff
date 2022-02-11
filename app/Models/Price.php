<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\PriceFilter;

/**
 * App\Models\Price
 *
 * @method static \Database\Factories\PriceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $amount
 * @property int $priceable_id
 * @property string $priceable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $priceable
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePriceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePriceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 */
class Price extends BaseModel
{

    public function queryFilterClass(): string
    {
        return PriceFilter::class;
    }

    public function priceable()
    {
        return $this->morphTo();
    }
}
