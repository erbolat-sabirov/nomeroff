<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\CarServiceDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarServiceRequest extends BaseRequest
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
        return new CarServiceDto($this->all());
    }
}
