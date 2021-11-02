<?php

namespace Database\Seeders;

use App\Models\EvaluacionPostulante;
use App\Models\Postulante;
use App\Models\Socio;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        Postulante::factory(500)->create();
        Socio::factory(100)->create();
        Vehiculo::factory(100)->create();
        EvaluacionPostulante::factory(200)->create();
    }
}
