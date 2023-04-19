<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run()
    {
        $administrador = Role::create(['name' => 'Admin']);
        $cliente = Role::create(['name' => 'Cliente']);
        $experto = Role::create(['name' => 'Experto']);

        Permission::create(['name' => 'home', 'description' => 'Buscar'])->syncRoles([$cliente, $administrador,$experto]);

        Permission::create(['name' => 'admin.consulta', 'description' => 'Ver modulo de usuarios'])->syncRoles([$cliente, $administrador,$experto]);
        Permission::create(['name' => 'admin.users.index', 'description' => 'Editar usuarios'])->syncRoles([$administrador,$experto]);
    }
}
