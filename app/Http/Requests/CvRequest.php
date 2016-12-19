<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CvRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'file' => 'required|type|max:file:5000',
        ];

    }

    public function messages()
    {
        return [
            'file.required' => 'Debe subir un archivo',
            'file.type' => 'El archivo que intenta subir no es requerido',
            'file:max:file' => 'El archivo que intenta subir es mayor a 5MB',
        ];
    }
}
