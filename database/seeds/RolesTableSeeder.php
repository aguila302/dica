<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Crea el rol de administrador.
        $roleAdmin = Role::create(['name' => 'administrador']);

        // Crea el rol de consulta.
        $roleVisitante = Role::create(['name' => 'consulta']);

        // Crea el rol de capturista.
        $roleCapturista = Role::create(['name' => 'capturista']);

    }
}
