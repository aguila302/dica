<?php

namespace Tests\Feature;

use App\Elemento;
use App\SubElemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarSubElementoTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_admin_puede_registrar_un_sub_elemento()
    {
        $userAdmin = createUserAdmin();
        $this->withExceptionHandling()->signIn($userAdmin);

        $elemento = factory(Elemento::class)->create();

        $this->visit("/elementos/{$elemento->id}/componente/registrar")
            ->type('Sub Elemento de prueba', 'descripcion')
            ->press('Guardar')
            ->seePageIs("elementos/{$elemento->id}/componentes")
            ->see('Sub Elemento de prueba');

        $this->seeInDatabase('sub_elementos', [
            'descripcion' => 'Sub Elemento de prueba',
        ]);
    }

    /** @test */
    public function la_descripcion_es_requerido()
    {
        $this->registrarSubElemento(['descripcion' => null])
            ->assertSessionHasErrors(['descripcion']);
    }

    public function registrarSubElemento($atributos = [])
    {
        $user = createUserAdmin();
        $this->withExceptionHandling()->signIn($user);

        $elemento    = factory(Elemento::class)->create();
        $subelemento = factory(SubElemento::class)->make($atributos);

        return $this->post("elementos/{$elemento->id}/componente", $subelemento->toArray());
    }
}
