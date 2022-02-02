<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\CarDto;
use App\Interfaces\DtoInterface;

class StoreCarRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getData(): DtoInterface
    {
        return new CarDto($this->all());
    }
}
