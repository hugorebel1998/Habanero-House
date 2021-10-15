<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // 'nombre' => 'required|max:30',
            // 'precio' => 'required',
            // 'descuento' => 'required',
            // 'descripcion' => 'required',
            // 'en_descuento' => 'required|in:0,1',
            // 'categoria' => 'required',   
            'imagen' => 'mimes:jpeg,jpg,png|required|max:10000',
        ];
    }
}
