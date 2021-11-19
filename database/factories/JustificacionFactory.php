<?php

namespace Database\Factories;

use App\Models\Justificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class JustificacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Justificacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'socio_id' => $this->faker->numberBetween(1, 350),
            'evento_socios_id' => $this->faker->numberBetween(1, 100),
            'justificacion' => $this->faker->text(),
            'status' => $this->faker->randomElement([1, 2, 3])
        ];
    }
}
