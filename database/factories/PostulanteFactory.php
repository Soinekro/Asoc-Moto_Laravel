<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Postulante;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postulante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique->numberBetween(1,$this->faker->numerify('9##')),
            'document_id'=> Document::all()->random()->id,
            'celular' => $this->faker->unique()->numerify('9########'),
            'distrito' =>$this->faker->city(),
            'direccion' =>$this->faker->address(),
            'numero' => $this->faker->numberBetween(80000000,9999999999999),
            'status' => rand(1,2),
        ];
    }
}
