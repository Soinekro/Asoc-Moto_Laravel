<?php

namespace Database\Factories;

use App\Models\Pago;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'=> $this->faker->randomElement(['boleta','factura']),
            'estadofe'=> $this->faker->randomElement(['0','1','2']),
            'concepto' => $this->faker->text(152),
            'opgravadas' => 84.75,
            'opinafectas' => 0,
            'opexoneradas' => 0,
            'igv' => 15.25,
            'total' => 100,
            'socio_id' => $this->faker->numberBetween(1, 350),
        ];
    }
}