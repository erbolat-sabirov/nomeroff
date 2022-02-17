<?php

namespace App\ViewModels\CarModel;

use App\Base\BaseCrud;
use App\Base\BaseModel;
use App\Base\BaseViewModel;
use App\Dto\CarModelDto;
use App\Services\Crud\CarBrandCrudService;
use Illuminate\Http\Request;

class CarModelEditViewModel extends BaseViewModel
{
    public $carBrandService;

    public function __construct(public ?BaseCrud $service = null, public array|Request $data = [], public ?BaseModel $model = null)
    {
        $this->carBrandService = app(CarBrandCrudService::class);
    }

    public function model()
    {
        return new CarModelDto($this->data ?: $this->model->toArray());
    }

    public function brands()
    {
        return $this->carBrandService->list()->pluck('title', 'id');
    }
}
