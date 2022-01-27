<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\ServiceDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'price' => ['required', 'numeric']
        ];
    }

    public function getData(): DtoInterface
    {
        return new ServiceDto($this->all());
    }
}
