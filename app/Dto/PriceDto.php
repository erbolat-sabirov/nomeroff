<?php

namespace App\Dto;

use App\Base\BaseDto;

class PriceDto extends BaseDto
{
    
    public $amount;
    public $priceable_id;
    public $priceable_type;

    public function dbData(): array
    {
        $data = [
            'amount' => $this->amount,
            'priceable_id' => $this->priceable_id,
            'priceable_type' => $this->priceable_type,
        ];

        return del_arr_elem_if_null($data);
    }
}