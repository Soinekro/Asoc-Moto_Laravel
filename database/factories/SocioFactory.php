<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Postulante;
use App\Models\Socio;
use DatePeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Socio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(500,600),
            'document_id'=> Document::all()->random()->id,
            'celular' => $this->faker->numerify('9########'),
            'distrito' =>$this->faker->city(),
            'direccion' =>$this->faker->address(),
            'numero' => $this->faker->numberBetween($this->faker->numerify('########'),$this->faker->numerify('#############')),
            'status'=> $this->faker->randomElement([1,2])
        ];
    }
}
