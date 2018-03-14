<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModificarAutopistaTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function usuario_admin_puede_modificar_autopista()
    {
        $user      = createUserAdmin();
        $autopista = factory(Autopista::class)->create([
            'nombre'                  => 'México - Pachuca',
            'cadenamiento_inicial_km' => '030',
            'cadenamiento_inicial_m'  => '120',
            'cadenamiento_final_km'   => '233',
            'cadenamiento_final_m'    => '023',
        ]);
        $this->signIn($user);

        $this->visit("/autopistas/{$autopista->id}/modificar")
            ->type('México - Pachuca Sur', 'nombre')
            ->type('031', 'cadenamiento_inicial_km')
            ->type('121', 'cadenamiento_inicial_m')
            ->type('234', 'cadenamiento_final_km')
            ->type('020', 'cadenamiento_final_m')
            ->press('Guardar')
            ->seePageIs('/autopistas');
    }
}
