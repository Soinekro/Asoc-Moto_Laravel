<?php

namespace Database\Factories;

use App\Models\Socio;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'socio_id'=> Socio::all()->unique()->random()->id,
            'placa'=> $this->faker->unique()->numerify('######'),
            'titulo'=> $this->faker->unique()->numerify('#################'),
            'soat' =>$this->faker->unique()->numerify('#########'),
            'modeloVehiculo' =>$this->faker->word(),
            'serieMotor'=> $this->faker->unique()->numerify('#############'),
            'type_veh' =>$this->faker->randomElement(['Normal','Torito']),
        ];
    }
}
