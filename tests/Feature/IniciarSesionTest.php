<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class IniciarSesionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_registrado_puede_iniciar_sesion()
    {
        $user = factory(User::class)->create();

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Iniciar sesión')
            ->seePageIs('inicio');
    }

    /** @test */
    public function user_no_registrado_no_puede_iniciar_sesion()
    {

        $this->withExceptionHandling();
        $this->visit('/login')
            ->type('ponches.ah@gmail.com', 'email')
            ->type('ponches', 'password')
            ->press('Iniciar sesión')
            ->seePageIs('/login');
    }
}
