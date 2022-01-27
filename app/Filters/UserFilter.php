<?php

namespace App\Filters;

use App\Base\BaseFilter;

class UserFilter extends BaseFilter
{

    public function manager($value)
    {
        return $this->builder->role($value);
    }
}
