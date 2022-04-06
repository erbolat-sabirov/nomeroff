<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Dto\WashingTimeDto;
use App\Models\Washing;
use App\Models\WashingTime;
use Carbon\Carbon;

class WashingTimeCrudService extends BaseCrud
{
    
    public $modelClass = WashingTime::class;

    public function setData(Washing $washing): WashingTimeDto
    {
        $dto = new WashingTimeDto();
        $dto->setTime(Carbon::now()->format('H:i'));
        $dto->setWashing_id($washing->id);
        $dto->setStatus($washing->status);

        return $dto;
    }
    
}