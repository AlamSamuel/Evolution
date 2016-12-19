<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WikisRequest extends Request
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
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El titulo de su glosario es obligatorio',
            'content.required' => 'La descripcion de su glosario es obligatorio',
        ];
    }
}
