<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\WashingFilter;

/**
 * App\Models\Washing
 *
 * @property-read \App\Models\Car|null $car
 * @property-read \App\Models\Service|null $service
 * @method static \Database\Factories\WashingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washing query()
 * @mixin \Eloquent
 */
class Washing extends BaseModel
{

    const STATUS_NEW = 'new';
    const STATUS_START = 'start';
    const STATUS_FINISH = 'finish';
    const STATUS_CANCEL = 'cancel';


    public function queryFilterClass(): string
    {
        return WashingFilter::class;
    }

    public static function getStatusList(): array
    {
        return [
            self::STATUS_NEW => __('message.new'),
            self::STATUS_START => __('message.start'),
            self::STATUS_FINISH => __('message.finish'),
            self::STATUS_CANCEL => __('message.cancel'),
        ];
    }

    public static function getStatusKeysList(): array
    {
        return [
            self::STATUS_NEW,
            self::STATUS_START,
            self::STATUS_FINISH,
            self::STATUS_CANCEL,
        ];
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
