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
 */
class Price extends BaseModel
{

    public function queryFilterClass(): string
    {
        return PriceFilter::class;
    }
}
