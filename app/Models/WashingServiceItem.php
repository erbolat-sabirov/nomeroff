<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WashingServiceItem
 *
 * @property int $washing_id
 * @property int $service_item_id
 * @method static \Illuminate\Database\Eloquent\Builder|WashingServiceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WashingServiceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WashingServiceItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|WashingServiceItem whereServiceItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WashingServiceItem whereWashingId($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\WashingServiceItemFactory factory(...$parameters)
 */
class WashingServiceItem extends Model
{
    use HasFactory;

    public $timestamps = false;
}