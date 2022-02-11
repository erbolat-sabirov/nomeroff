<?php

namespace App\ViewModels\Car;

use App\Base\BaseCrud;
use App\Base\BaseModel;
use App\Base\BaseViewModel;
use App\Dto\CarDto;
use App\Services\Crud\CarBrandCrudService;
use App\Services\Crud\CarModelCrudService;
use App\Services\Crud\CarTypeCrudService;
use Illuminate\Http\Request;

class CarCreateViewModel extends BaseViewModel
{
    public $carTypeService;
    public $carBrandService;
    public $carModelService;

    public function __construct(public ?BaseCrud $service = null, public array|Request $data = [], public ?BaseModel $model = null)
    {
        $this->carTypeService = app(CarTypeCrudService::class);
        $this->carBrandService = app(CarBrandCrudService::class);
        $this->carTypeService = app(CarModelCrudService::class);
    }


    public function model()
    {
        return new CarDto($this->data);
    }

    public function types()
    {
        return $this->carTypeService->list()->pluck('title', 'id');
    }

    public function brands()
    {
        return $this->carBrandService->list()->pluck('title', 'id');
    }

    public function carModels()
    {
        return $this->carModelService->list()->pluck('title', 'id');
    }
}
