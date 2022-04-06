<?php

namespace App\ViewModels\Washing;

use App\Base\BaseViewModel;
use App\Models\Washing;

class WashingListViewModel extends BaseViewModel
{

    public function models()
    {
        $data = $this->data;
        $data['status'] = Washing::STATUS_START;
        $models = $this->service->list(data:$data, with:['car', 'service', 'serviceItems', 'users']);
        return $models;
    }

    public function newModels()
    {
        
        $data = $this->data;
        $data['status'] = Washing::STATUS_NEW;
        $models = $this->service->list(data:$data, with:['car', 'service', 'serviceItems', 'users']);

        return $models;
    }

}
