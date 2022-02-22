<?php

namespace App\Dto;

use App\Base\BaseDto;

class WashingDto extends BaseDto
{
    
    public $car_id;
    public $service_id;
    public $status;
    public $service_items;

    public function dbData(): array
    {
        $data = [
            'car_id' => $this->car_id,
            'service_id' => $this->service_id,
            'status' => $this->status,
        ];

        return del_arr_elem_if_null($data);
    }

    public function getServiceItems()
    {
        return $this->service_items;
    }
}