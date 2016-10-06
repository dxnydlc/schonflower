<?php

namespace shonflower\Http\Requests;

use shonflower\Http\Requests\Request;

class usuarioAddRequest extends Request
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
            'name'      => 'required',
            'apellidos' => 'required',
            'email'     => 'required',
            'telefono'  => 'required',
            'tipo'      => 'required'
        ];
    }
}
