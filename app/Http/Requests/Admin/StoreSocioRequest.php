<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocioRequest extends FormRequest
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
            'distrito'=>'regex:/^[\pL\s\-]+$/u',
            'direccion'=>'regex:/^[\pL\s\-]+$/u',
            'numero'=>'no required|regex:/^([0-9\s\-\+\(\)]*)$/|max:13',
            'celular'=>'regex:/^([0-9\s\-\+\(\)]*)$/|digits:9',
        ];
    }
    public function messages()
{
    return [
        'user.regex' => 'El campo Usuario no acepta numeros',
        'distrito.regex' => 'El campo Distrito no acepta numeros',
        'numero.regex' => 'El campo Numero no acepta letras',
        'celular.regex' => 'El campo Celular no acepta letras',
        'numero.max' => 'El campo Documento acepta max 13 digitos',
        'celular.digits' => 'El campo Numero acepta 9 digitos',
        'status.in' => 'El campo Estado solo acepta valores entre Pendiente y Evaluado'
    ];
}
}
