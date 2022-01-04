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
        $n = $this->faker->numerify('###');
        return [
            'type'=> $this->faker->randomElement(['boleta','factura']),
            'estadofe'=> $this->faker->randomElement(['0','1','2']),
            'concepto' => $this->faker->text(152),
            'total' =>$n,
            'opgravadas' => $n*100/118,
            'opinafectas' => 0,
            'opexoneradas' => 0,
            'igv' => $n*18/118,
            'socio_id' => $this->faker->numberBetween(1, 350),
        ];
    }
}
