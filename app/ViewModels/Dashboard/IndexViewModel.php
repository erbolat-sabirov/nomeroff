<?php

namespace App\ViewModels\Dashboard;

use App\Base\BaseModel;
use App\Base\BaseViewModel;
use App\Models\Washing;
use App\Services\Crud\WashingCrudService;
use Illuminate\Http\Request;

class IndexViewModel extends BaseViewModel
{
    
    public function models()
    {
        $models = $this->service->all([
            'status' => [Washing::STATUS_NEW, Washing::STATUS_START]
        ],['car', 'times']);
        // dd($models);
        return $models;
    }
}