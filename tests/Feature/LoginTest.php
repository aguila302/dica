<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_registrado_puede_iniciar_sesion()
    {
        $user = factory(User::class)->create();

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('inicio');
    }

    /** @test */
    public function user_no_registrado_no_puede_iniciar_sesion()
    {
        $user = factory(User::class)->create();

        $this->visit('/login')
            ->type('hernandez_pon@live.com.mx', 'email')
            ->type('hernandez_pon', 'password')
            ->press('Login')
            ->seePageIs('login');
    }
}
