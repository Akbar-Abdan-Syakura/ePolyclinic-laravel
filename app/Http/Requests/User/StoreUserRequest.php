<?php

namespace App\Http\Requests\User;

use App\Models\User;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel at here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
            ],
            'email' => [
                'required', 'max:255', 'email', 'unique:users',
            ],
            'password' => [
                'min:8', 'max:255', 'string', 'mixedCase',
            ],
            // add validation for role is here

        ];
    }
}
