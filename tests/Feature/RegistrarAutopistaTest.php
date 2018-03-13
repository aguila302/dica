<?php

namespace Tests\Feature;

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
    public function usuario_visitante_no_puede_registrar_autopista()
    {
        //$user = createUserVisitante();

        //$this->signIn($user);

        $response = $this->call('GET', 'autopistas/registrar');
        $this->assertRedirectedTo('autopistas');

        // $user = createUserVisitante();

        // $this->signIn($user);
        // $this->visit('/autopistas')
        //     ->dontSee('Nueva autopista');
    }

    /** @test */
    // public function el_nombre_es_requerido()
    // {
    //     $user = createUserAdmin();
    //     $this->signIn($user);

    //     $response = $this->call('POST', 'autopistas', [
    //         'nombre'                  => '',
    //         'cadenamiento_inicial_km' => '221',
    //         'cadenamiento_inicial_m'  => '045',
    //         'cadenamiento_final_km'   => '234',
    //         'cadenamiento_final_m'    => '012',
    //     ]);
    //     $this->assertSessionHasErrors(['nombre']);

    //     $this->assertEquals(0, Autopista::count());
    // }
}
