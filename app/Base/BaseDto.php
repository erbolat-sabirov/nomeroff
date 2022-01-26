<?php

namespace App\Base;

use App\Interfaces\DtoInterface;
use App\Traits\LazyLoadTrait;
use App\Traits\ToArrayTrait;

abstract class BaseDto implements DtoInterface
{
    use LazyLoadTrait;
    use ToArrayTrait;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->load($data);
        }
    }

}