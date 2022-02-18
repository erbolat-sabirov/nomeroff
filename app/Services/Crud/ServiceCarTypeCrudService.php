<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Base\BaseModel;
use App\Dto\ServiceCarTypeDto;
use App\Models\Service;
use App\Models\ServiceCarType;

class ServiceCarTypeCrudService extends BaseCrud
{
    public $modelClass = ServiceCarType::class;

    public function createMany(array $data)
    {
        $this->dto = new ServiceCarTypeDto($data);
        $resData = [];
        foreach ($this->dto->dbManyData() as $key => $data) {
            $model = $this->create(new ServiceCarTypeDto($data));
            $resData[$key]['service_car_type_id'] = $model->id;
            $resData[$key]['amount'] = $data['amount'];
        }
        return $resData;
    }

    public function deleteMany(BaseModel $service)
    {
        $serviceCarTypes = $service->serviceCarTypes;

        foreach ($serviceCarTypes as $key => $sCarType) {
            $sCarType->delete();
        }

        return true;
    }

    public function list(array $data = [])
    {
        $models = $this->query()
                    ->filter($data)
                    ->with(['serviceable', 'price'])
                    ->paginate();
        return $models;
    }
}