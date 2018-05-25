<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class IniciarSesionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_registrado_puede_iniciar_sesion()
    {
        $this->withExceptionHandling();

        $user = createUserAdmin();

        $this->visit('/login')
            ->type($user->username, 'username')
            ->type('develop', 'password')
            ->press('Iniciar sesión')
            ->seePageIs('inicio');
    }

    /** @test */
    public function user_no_registrado_no_puede_iniciar_sesion()
    {

        $this->withExceptionHandling();
        $this->visit('/login')
            ->type('ponches uyuy', 'username')
            ->type('ponches', 'password')
            ->press('Iniciar sesión')
            ->seePageIs('/login');
    }
}
