<?php

namespace App\Http\Requests\Poli;

use App\Models\MasterData\Poli;
// use Gate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePoliRequest extends FormRequest
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
                'required', 'string', 'max:255', Rule::unique('poli')->ignore($this->poli),
            ],
            'price' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}