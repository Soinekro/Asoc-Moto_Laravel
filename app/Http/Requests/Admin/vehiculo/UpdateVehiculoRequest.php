<?php

namespace App\Http\Requests\Admin\vehiculo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehiculoRequest extends FormRequest
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
            'placa' => 'regex:/^[0-9\pL\s\-]+$/u|max:6',
            'titulo' => 'regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            'modeloVehiculo' => '',
            'serieMotor' => 'min:15',
        ];
    }
    public function messages()
    {
        return [
            'placa.max'=>'Maximo 6 Caracteres',
            'serieMotor.required'=>'Campo serie de Motor Requerido',
            'serieMotor.unique'=>'La serie de Motor ya se Encuentra registrada',
            'placa.unique'=>'La Placa ya se Encuentra registrada',
            'titulo.unique'=>'El titulo ya se Encuentra registrado',
            'soat.unique'=>'El SOAT ya se Encuentra registrado',
            'titulo.regex'=>'Campo titulo solo admite numeros',
            'serieMotor.min'=>'minimo 15 caracteres',
        ];
    }
}
