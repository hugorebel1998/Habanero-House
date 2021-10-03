<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nombre'               => 'required|min:3|max:15',
            'apellido_paterno'     => 'required|max:15',
            'apellido_materno'     => 'required|max:15',
            'fecha_de_nacimiento'  => 'required',
            'teléfono'             => 'required|numeric|min:10',
            'correo_electrónico'   => 'required|email|unique:users,email',
            'contraseña'           => 'min:8|required_with:confirmar_contraseña|same:confirmar_contraseña',
            'confirmar_contraseña' => 'required|min:8'

        ];
    }
}
