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
 */
class ServiceItem extends BaseModel
{

    public function queryFilterClass(): string
    {
        return ServiceFilter::class;
    }
}
