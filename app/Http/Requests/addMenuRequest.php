<?php

namespace shonflower\Http\Requests;

use shonflower\Http\Requests\Request;

class addMenuRequest extends Request
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
            'id_combo'  => 'required',
            'fecha'     => 'required'
        ];
    }
}
