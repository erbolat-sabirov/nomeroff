<?php

namespace App\ViewModels\CarModel;

use App\Base\BaseCrud;
use App\Base\BaseModel;
use App\Base\BaseViewModel;
use App\Dto\CarModelDto;
use App\Services\Crud\CarBrandCrudService;
use App\Services\Crud\CarTypeCrudService;
use Illuminate\Http\Request;

class CarModelEditViewModel extends BaseViewModel
{
    public $carBrandService;
    public $carTypesService;

    public function __construct(public ?BaseCrud $service = null, public array|Request $data = [], public ?BaseModel $model = null)
    {
        $this->carBrandService = app(CarBrandCrudService::class);
        $this->carTypesService = app(CarTypeCrudService::class);
    }

    public function model()
    {
        return new CarModelDto($this->data ?: $this->model->toArray());
    }

    public function brands()
    {
        return $this->carBrandService->list()->pluck('title', 'id');
    }

    public function types()
    {
        return $this->carTypesService->list()->pluck('title', 'id');
    }
}
