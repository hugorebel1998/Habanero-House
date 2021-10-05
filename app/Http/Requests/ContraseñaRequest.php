<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContraseñaRequest extends FormRequest
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
            'contraseña' => 'min:8|required',
            'nueva_contraseña' => 'min:8|required_with:confirmar_nueva_contraseña|same:confirmar_nueva_contraseña',
            'confirmar_nueva_contraseña' => 'required|min:8'
        ];
    }
}
