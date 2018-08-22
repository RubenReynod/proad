<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'codigo'=>'required|unique:profesores,'.$this->id.",codigo",
            'contraseña'=>'required_without:id|min:5',
            'nombre'=>'digits:5',
            'apellidoP'=>'digits:15',
            'apellidoM'=>'digits:15',
            'status'=>'digits:10',
            'sexo'=>'digits:8',     
        ];
    }
}
