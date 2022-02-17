<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Dto\PriceDto;
use App\Models\Price;
use App\Models\Service;

class PriceCrudService extends BaseCrud
{
    
    public $modelClass = Price::class;

    public function createMany(PriceDto $priceDto): array
    {
        $serviceCarTypes = app(ServiceCarTypeCrudService::class)->createMany($priceDto->getTypesData());
        $result = []; 
        foreach ($serviceCarTypes as $key => $value) {
            $result[] = $this->create(new PriceDto($value));
        }

        return $result;
    }

    public function updateMany(PriceDto $priceDto, Service $service): array
    {
        $serviceCarTypes = $service->serviceCarTypes;
        $result = [];
        foreach ($serviceCarTypes as $key => $sCarType) {
            $price = $sCarType->price;
            if ($price) {
                $result[] = $this->update(new PriceDto(['amount' => $priceDto->types[$sCarType['car_type_id']]['amount']]), $price->id);
            }
        }
        return $result;
    }
}