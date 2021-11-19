<?php

namespace Database\Factories;

use App\Models\EventoSocio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoSocioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventoSocio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_evento' => $this->faker->word(),
            'descripcion_evento' => $this->faker->text(),
            'fecha_hora' => $this->faker->dateTimeBetween('-1 years', '+2 months', 'america/lima'),
            'direccion' => $this->faker->address(),
        ];
    }
}
