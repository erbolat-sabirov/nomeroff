<?php

namespace App\Base;

use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;

abstract class BaseViewModel extends ViewModel
{
    public function __construct(public ?BaseCrud $service = null, public array|Request $data = [], public ?BaseModel $model = null)
    {
    }

}