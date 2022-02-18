<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Base\BaseModel;
use App\Dto\PriceDto;
use App\Models\Price;
use App\Models\Service;

class PriceCrudService extends BaseCrud
{
    
    public $modelClass = Price::class;

    public function createMany(array $data): array
    {
        $result = []; 
        foreach ($data as $key => $value) {
            $result[] = $this->create(new PriceDto($value));
        }

        return $result;
    }

    public function updateMany(PriceDto $priceDto, BaseModel $service): array
    {
        $serviceCarTypes = $service->serviceCarTypes;
        $result = [];
        foreach ($serviceCarTypes as $key => $sCarType) {
            $price = $sCarType->price;
            if ($price) {
                $result[] = $this->update(new PriceDto([
                    'amount' => $priceDto->types[$sCarType['car_type_id']]['amount']
                ]), $price->id);
            }
        }
        return $result;
    }
}