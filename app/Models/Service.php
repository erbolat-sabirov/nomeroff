<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\ServiceFilter;

class Service extends BaseModel
{
    public function queryFilterClass(): string
    {
        return ServiceFilter::class;
    }
}
