<?php

namespace Database\Seeders;

use App\Models\EvaluacionPostulante;
use App\Models\EventoSocio;
use App\Models\Justificacion;
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
        Postulante::factory(800)->create();
        $postulantes = Postulante::where('status', '=', 2)->get();
        foreach ($postulantes as $p) {
            Socio::factory(1)->create([
                'user_id' => $p->user->id,
                'document_id' => $p->document_id,
                'celular' => $p->celular,
                'distrito' => $p->distrito,
                'direccion' => $p->direccion,
                'numero' => $p->numero,
            ]);
        }

        Vehiculo::factory(100)->create();
        EvaluacionPostulante::factory(200)->create();

        EventoSocio::factory(100)->create();
        Justificacion::factory(200)->create();
    }
}
