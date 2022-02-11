<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceId
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId query()
 * @mixin \Eloquent
 * @property int $service_id
 * @property int $service_item_id
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId whereServiceItemId($value)
 */
class ServiceId extends Model
{
    use HasFactory;
}
