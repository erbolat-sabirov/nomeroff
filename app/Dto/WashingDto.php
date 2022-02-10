<?php

namespace App\Dto;

use App\Base\BaseDto;

class WashingDto extends BaseDto
{
    
    public $car_id;
    public $service_id;
    public $status;

    public function dbData(): array
    {
        $data = [];

        return del_arr_elem_if_null($data);
    }
}