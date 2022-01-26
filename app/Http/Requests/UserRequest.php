<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\UserDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function getData(): DtoInterface
    {
        return new UserDto($this->all());
    }
}
