<?php

use App\User;
use Spatie\Permission\Models\Role;

function createUserAdmin()
{
    $roleAdmin = Role::create(['name' => 'administrador']);

    $user = factory(User::class)->create();
    $user->assignRole('administrador');
    return $user;
}

function createUserConsulta()
{

    $roleConsulta = Role::create(['name' => 'consulta']);

    $user = factory(User::class)->create();
    $user->assignRole('consulta');
    return $user;
}

function createUserCaptura()
{

    $role = Role::create(['name' => 'capturista']);

    $user = factory(User::class)->create();
    $user->assignRole('capturista');
    return $user;
}
