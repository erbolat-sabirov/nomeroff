<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\CarServiceFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\CarService
 *
 * @property int $id
 * @property int $car_id
 * @property int|null $service_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CarServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarService query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Car $car
 * @property-read \App\Models\Service|null $service
 */
class CarService extends BaseModel
{

    const STATUS_START = 'start';
    const STATUS_FINISH = 'finish';

    public function queryFilterClass(): string
    {
        return CarServiceFilter::class;
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_START,
            self::STATUS_FINISH
        ];
    }

    public static function statusNames()
    {
        return [
            self::STATUS_START => 'Start',
            self::STATUS_FINISH => 'Finish'
        ];
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
