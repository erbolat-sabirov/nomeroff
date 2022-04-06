<?php

namespace App\Filters;

use App\Base\BaseFilter;

class UserFilter extends BaseFilter
{

    public function manager($value)
    {
        return $this->builder->role($value);
    }

    public function user($value)
    {
        if ($value) {
            return $this->builder->doesntHave('roles');
        }
    }
}
