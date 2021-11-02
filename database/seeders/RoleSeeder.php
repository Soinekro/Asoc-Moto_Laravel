<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Postulante;
use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Socio']);
        $role3 = Role::create(['name' => 'Presidente']);
        $role4 = Role::create(['name' => 'VicePresidente']);
        $role5 = Role::create(['name' => 'Secretario']);
        $role6 = Role::create(['name' => 'Tesorero']);
        $role7 = Role::create(['name' => '1-Vocal']);
        $role8 = Role::create(['name' => '2-Vocal']);
        $role9 = Role::create(['name' => 'Fiscal']);
        $role10 = Role::create(['name' => 'Asistente']);
        $role11 = Role::create(['name' => 'Mototaxista']);

        Permission::create(['name'=>'admin.home',
        'description'=>'ver dashboard'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role7, $role8,$role9,$role10,$role11]);
        User::create([
            'name'=>'Elder Jose Chumacero Jimenez',
            'email'=>'echumaceroj@mail.com',
            'password'=>bcrypt('elder123'),
        ])->assignRole('Admin');

        Document::create([
            'name'=>'dni',
            'digitos'=>8,
        ]);
        Document::create([
            'name'=>'ruc',
            'digitos'=>13,
        ]);

        Document::create([
            'name'=>'carnet',
            'digitos'=>8,
        ]);

        Document::create([
            'name'=>'partida',
            'digitos'=>13,
        ]);

        Document::create([
            'name'=>'pasaporte',
            'digitos'=>11,
        ]);

        User::factory(1000)->create();
    }
}
