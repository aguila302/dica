<?php

use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

function createUserAdmin()
{
    $role       = Role::create(['name' => 'admin']);
    $permission = Permission::create(['name' => 'ver autopista']);
    $role->givePermissionTo($permission);

    $user = factory(User::class)->create();
    $user->assignRole('admin');
    return $user;
}

function createUserVisitante()
{
    $role       = Role::create(['name' => 'visitante']);
    $permission = Permission::create(['name' => 'ver autopista']);
    $role->givePermissionTo($permission);

    $user = factory(User::class)->create();
    $user->assignRole('visitante');
    return $user;
}
