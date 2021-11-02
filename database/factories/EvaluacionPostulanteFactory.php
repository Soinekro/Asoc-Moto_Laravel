<?php

namespace Database\Factories;

use App\Models\EvaluacionPostulante;
use App\Models\Postulante;
use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluacionPostulanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EvaluacionPostulante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'socio_id' => Socio::all()->unique()->random()->id,
            'postulante_id'=> Postulante::all()->unique()->random()->id,
            'status' =>$this->faker->randomElement([1,2,3])
        ];
    }
}
