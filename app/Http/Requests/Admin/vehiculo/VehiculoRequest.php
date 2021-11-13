<?php

namespace App\Http\Requests\Admin\vehiculo;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'placa' => 'required|unique:vehiculos|regex:/^[0-9\pL\s\-]+$/u|max:6',
            'soat' => 'required|unique:vehiculos',
            'titulo' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:vehiculos',
            'modeloVehiculo' => 'required|',
            'serieMotor' => 'required|unique:vehiculos|min:15',
        ];
    }
    public function messages()
    {
        return [
            'placa.required'=>'Campo Placa Requerido',
            'soat.required'=>'Campo soat Requerido',
            'modeloVehiculo.required'=>'Campo modelo Requerido',
            'titulo.required'=>'Campo titulo Requerido',
            'serieMotor.required'=>'Campo serie de Motor Requerido',
            'serieMotor.unique'=>'La serie de Motor ya se Encuentra registrada',
            'placa.unique'=>'La Placa ya se Encuentra registrada',
            'titulo.unique'=>'El titulo ya se Encuentra registrado',
            'soat.unique'=>'El SOAT ya se Encuentra registrado',
            'titulo.regex'=>'Campo titulo solo admite numeros',
        ];
    }
}
