<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostulanteRequest extends FormRequest
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
            'numero'=>'regex:/^([0-9\s\-\+\(\)]*)$/|max:13',
            'celular'=>'regex:/^([0-9\s\-\+\(\)]*)$/|digits:9',
            'status'=>'in:1,2',
        ];
    }
    public function messages()
{
    return [
        'distrito.required' => 'la Ciudad es un campo Requerido',
        'numero.required' => 'El Documento es un campo Requerido',
        'direccion.required' => 'La Direccion es un campoRequerido',
        'celular.required' => 'El Celular es un campo Requerido',
        'status.required' => 'El Estado es un Campo Requerido',
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
