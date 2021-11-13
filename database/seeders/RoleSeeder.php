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
        'description'=>'ver dashboard'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6,$role7,$role8,$role9,$role10,$role11]);

        Permission::create(['name'=>'admin.postulantes.index',
        'description'=>'ver Postulantes'])->syncRoles([$role1,$role5,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.postulantes.create',
        'description'=>'Insertar postulante'])->syncRoles([$role1,$role5,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.postulantes.store',
        'description'=>'Crear postulante'])->syncRoles([$role1,$role5,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.postulantes.update',
        'description'=>'actualizar postulante'])->syncRoles([$role1,$role5,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.postulantes.edit',
        'description'=>'editar postulante'])->syncRoles([$role1,$role5,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.postulantes.destroy',
        'description'=>'eliminar postulante'])->syncRoles([$role1,$role5,$role3,$role4,$role5]);

        Permission::create(['name'=>'admin.roles.index',
        'description'=>'ver roles'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.roles.create',
        'description'=>'Insertar rol'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.roles.store',
        'description'=>'Crear rol'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.roles.update',
        'description'=>'actualizar rol'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.roles.edit',
        'description'=>'editar rol'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.roles.destroy',
        'description'=>'eliminar rol'])->syncRoles([$role1,$role3,$role4]);

        Permission::create(['name'=>'admin.socios.index',
        'description'=>'ver socios'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.socios.create',
        'description'=>'Insertar socio'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.socios.store',
        'description'=>'Crear socio'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.socios.update',
        'description'=>'actualizar socio'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.socios.edit',
        'description'=>'editar socio'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name'=>'admin.socios.destroy',
        'description'=>'eliminar socio'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.socios.inactivos',
        'description'=>'ver socios inactivos'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name'=>'admin.vehiculos.index',
        'description'=>'ver vehiculos'])->syncRoles([$role1,$role5,$role4,$role3]);
        Permission::create(['name'=>'admin.vehiculos.create',
        'description'=>'Insertar vehiculo'])->syncRoles([$role1,$role5,$role4,$role3]);
        Permission::create(['name'=>'admin.vehiculos.store',
        'description'=>'Crear vehiculo'])->syncRoles([$role1,$role5,$role4,$role3]);
        Permission::create(['name'=>'admin.vehiculos.update',
        'description'=>'actualizar vehiculo'])->syncRoles([$role1,$role5,$role4,$role3]);
        Permission::create(['name'=>'admin.vehiculos.edit',
        'description'=>'editar vehiculo'])->syncRoles([$role1,$role5,$role4,$role3]);
        Permission::create(['name'=>'admin.vehiculos.destroy',
        'description'=>'eliminar vehiculo'])->syncRoles([$role1,$role5,$role4,$role3]);

        Permission::create(['name'=>'admin.users.index',
        'description'=>'ver usuarios'])->syncRoles([$role1,$role4,$role3]);
        Permission::create(['name'=>'admin.users.create',
        'description'=>'Insertar usuario'])->syncRoles([$role1,$role4,$role3]);
        Permission::create(['name'=>'admin.users.store',
        'description'=>'Crear usuario'])->syncRoles([$role1,$role4,$role3]);
        Permission::create(['name'=>'admin.users.update',
        'description'=>'actualizar usuario'])->syncRoles([$role1,$role4,$role3]);
        Permission::create(['name'=>'admin.users.edit',
        'description'=>'editar usuario'])->syncRoles([$role1,$role4,$role3]);
        Permission::create(['name'=>'admin.users.destroy',
        'description'=>'eliminar usuario'])->syncRoles([$role1,$role4,$role3]);

        User::create([
            'name'=>'Elder Jose Chumacero Jimenez',
            'email'=>'echumaceroj@mail.com',
            'password'=>bcrypt('elder123'),
        ])->assignRole('Admin');

        User::create([
            'name'=>'Boris Huaman Gastelou',
            'email'=>'borishg@mail.com',
            'password'=>bcrypt('boris123'),
        ])->assignRole('Presidente');

        User::create([
            'name'=>'Maria Jose Tejeda Coca',
            'email'=>'MariaCoca@mail.com',
            'password'=>bcrypt('maria123'),
        ])->assignRole('VicePresidente');


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
