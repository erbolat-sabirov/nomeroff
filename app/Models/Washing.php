<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\WashingFilter;
use Illuminate\Database\Eloquent\Builder;

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
 * @property int $id
 * @property int $car_id
 * @property int|null $service_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WashingServiceItem[] $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ServiceItem[] $serviceItems
 * @property-read int|null $service_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 */
class Washing extends BaseModel
{

    const STATUS_NEW = 'new';
    const STATUS_START = 'start';
    const STATUS_FINISH = 'finish';
    const STATUS_CANCEL = 'cancel';


    protected $attributes = [
        'status' => self::STATUS_NEW
    ];

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

    public function statusColors()
    {
        return [
            self::STATUS_NEW => 'bg-blue-500',
            self::STATUS_START => 'bg-teal-500',
            self::STATUS_FINISH => 'bg-slate-500',
            self::STATUS_CANCEL => 'bg-red-500'
        ];
    }

    public function getStatusColor(): string
    {
        return $this->statusColors()[$this->status];
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

    public function serviceItems()
    {
        return $this->hasManyThrough(
            ServiceItem::class, 
            WashingServiceItem::class,
            'washing_id',
            'id',
            'id',
            'service_item_id'
        );
    }

    public function price()
    {
        return $this->service()->with(['serviceCarType' => function($query){
            $query->where('car_type_id', $this->car->car_type_id);
        }])->first();
    }

    public function getPrice()
    {
        dd($this->price());
        return $this->price()?->amount;
    }

    public function items()
    {
        return $this->hasMany(WashingServiceItem::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class, 
            WashingUser::class,
            'washing_id',
            'id',
            'id',
            'user_id'
        );
    }

    public function usersThrough()
    {
        return $this->hasMany(WashingUser::class);
    }

    public function times()
    {
        return $this->hasMany(WashingTime::class);
    }

    public function getNewTime()
    {
        return $this->times()->where('status', self::STATUS_NEW)->first()->time;
    }

    public function getStatus()
    {
        return $this->getStatusList()[$this->status];
    }
}
