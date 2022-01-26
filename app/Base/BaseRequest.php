<?php

namespace App\Base;

use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    abstract public function getData(): DtoInterface;
}