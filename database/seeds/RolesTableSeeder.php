<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Crea el rol de admin
        $roleAdmin       = Role::create(['name' => 'admin']);
        $permissionAdmin = Permission::create(['name' => 'nueva autopista']);
        $roleAdmin->givePermissionTo($permissionAdmin);

        // Crea el rol de visitante
        $roleVisitante       = Role::create(['name' => 'visitante']);
        $permissionVisitante = Permission::create(['name' => 'ver autopista']);
        $roleVisitante->givePermissionTo($permissionVisitante);
    }
}
