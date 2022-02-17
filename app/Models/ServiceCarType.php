<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\ServiceCarTypeFilter;

class ServiceCarType extends BaseModel
{

    public function queryFilterClass(): string
    {
        return ServiceCarTypeFilter::class;
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function serviceable()
    {
        return $this->morphTo();
    }

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }
}
