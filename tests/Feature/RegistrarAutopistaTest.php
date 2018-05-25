<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarAutopistaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_admin_puede_registrar_autopista()
    {
        $user = createUserAdmin();

        $this->signIn($user);

        $this->visit('/autopistas/registrar')
            ->type('México - Pachuca', 'nombre')
            ->type('030', 'cadenamiento_inicial_km')
            ->type('120', 'cadenamiento_inicial_m')
            ->type('233', 'cadenamiento_final_km')
            ->type('023', 'cadenamiento_final_m')
            ->press('Guardar')
            ->seePageIs('/autopistas');
    }

    /** @test */
    public function usuario_consulta_no_puede_registrar_autopista()
    {
        $user = createUserConsulta();

        $this->signIn($user);
        $this->visit('/autopistas')
            ->dontSee('Nueva autopista');
    }

    /** @test */
    public function user_consulta_no_puede_ver_pagina_crear_autopista()
    {
        $this->withExceptionHandling()
            ->get('/autopistas/registrar')
            ->assertRedirectedTo('/login');
    }

    /** @test */
    public function el_nombre_es_requerido()
    {
        $this->registrarAutopista(['nombre' => null])
            ->assertSessionHasErrors(['nombre']);
    }

    public function registrarAutopista($atributos = [])
    {
        $user = createUserAdmin();
        $this->withExceptionHandling()->signIn($user);

        $autopista = factory(Autopista::class)->make($atributos);

        return $this->post('autopistas', $autopista->toArray());
    }
}
