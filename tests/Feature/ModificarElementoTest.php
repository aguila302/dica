<?php

namespace Tests\Feature;

use App\Elemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModificarElementoTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function user_admin_puede_modificar_un_elemento()
    {
        $userAdmin = createUserAdmin();
        $this->withExceptionHandling()->signIn($userAdmin);

        $elemento = factory(Elemento::class)->create();

        $this->visit("elementos/{$elemento->id}/modificar")
            ->type('Elemento actualizado', 'descripcion')
            ->press('Guardar')
            ->seePageIs('/elementos')
            ->see('Elemento actualizado');

        $this->seeInDatabase('elementos', [
            'descripcion' => 'Elemento actualizado',
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
