<?php

namespace App\Http\Requests\Doctor;

use App\Models\Operational\Doctor;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDoctorRequest extends FormRequest
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
            'poli_id' => [
                'required', 'integer',
            ],
            'name' => [
                'required', 'string', 'max:255',
            ],
            'fee' => [
                'required', 'string', 'max:255',
            ],
            'photo' => [
                'nullable', 'string', 'max:10000',
            ],
        ];
    }
}