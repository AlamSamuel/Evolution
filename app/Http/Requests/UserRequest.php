<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'full_name' => 'required|max:255',
            'id_card' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|numeric',
            'address' => 'required',
            'file' => 'required|mimes:jpg,png,jpeg|max:5000000',
        ];
    }

    public function messages()
    {   
        return [
            'full_name.required' => 'El Nombre es obligatorio',
            'id_card.required' => 'El documento de identidad es obligatorio',
            'id_card.unique' => 'La cedula que intenta colocar ya ha sido registrada',
            'password.required' => 'La cedula es obligatorio',
            'phone.required' => 'El telefono es obligatorio',
            'phone.numeric' => 'El telefono debe ser solo numeros',
            // 'country.required' => 'El nombre de la ciudad de residencia es obligatorio',
            'address.required' => 'La direccion es obligatoria',
            'file.required' => 'Debe seleccionar una imagen',
            'file.mimes' => 'La imagen debe ser de formato JPG,PNG o JPEG',
            'file.max' => 'La imagen sobrepasa el limite establecido',  
        ];
    }
}
