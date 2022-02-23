<?php

namespace App\Filters;

use App\Base\BaseFilter;

class WashingFilter extends BaseFilter
{

    public function status($value)
    {
        return $this->builder->where('status', $value);
    }
}