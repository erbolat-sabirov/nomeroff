<?php

namespace App\Dto;

use App\Base\BaseDto;

class PriceDto extends BaseDto
{

    public $amount;
    public $service_car_type_id;
    public $types;
    public $service_id;
    public $model;
    public $service_items;

    public function dbData(): array
    {
        $data = [
            'amount' => $this->amount,
            'service_car_type_id' => $this->service_car_type_id,
        ];

        return del_arr_elem_if_null($data);
    }

    public function getTypesData(): array
    {
        return [
            'types' => $this->types,
            'serviceable_id' => $this->service_id,
            'serviceable_type' => $this->model,
        ];
    }

    public function getServiceItemsData()
    {
        $data = [];
        if (is_array($this->service_items)) {
            foreach ($this->service_items as $key => $item) {
                $data[$key]['service_id'] = $this->service_id;
                $data[$key]['service_item_id'] = $item['id'];
            }
        }
        return $data;
    }
}
