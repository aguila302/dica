<?php

namespace Tests\Feature;

use App\Elemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarElementoTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_admin_puede_registrar_un_elemento()
    {
        $userAdmin = createUserAdmin();
        $this->withExceptionHandling()->signIn($userAdmin);

        $this->visit('/elementos/registrar')
            ->type('Elemento de prueba', 'descripcion')
            ->press('Guardar')
            ->seePageIs('/elementos')
            ->see('Elemento de prueba');

        $this->seeInDatabase('elementos', [
            'descripcion' => 'Elemento de prueba',
        ]);
    }

    /** @test */
    public function la_descripcion_es_requerido()
    {
        $this->registrarElemento(['descripcion' => null])
            ->assertSessionHasErrors(['descripcion']);
    }

    public function registrarElemento($atributos = [])
    {
        $user = createUserAdmin();
        $this->withExceptionHandling()->signIn($user);

        $elemento = factory(Elemento::class)->make($atributos);

        return $this->post('elementos', $elemento->toArray());
    }
}
