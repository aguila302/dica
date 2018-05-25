<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AsignaAutopistasAusuarioTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_admin_puede_asignar_autopistas()
    {
        $this->withExceptionHandling();

        $userAdmin    = createUserAdmin();
        $userConsulta = createUserConsulta();
        $autopista    = factory(Autopista::class)->create();

        $this->signIn($userAdmin);
        $this->visit("/usuarios/{$userConsulta->id}/modificar");
        $this->select($autopista->id, 'autopistas');
        $this->press('Asignar');

        $autopistasAsignadas = $userConsulta->autopistas;
        $this->assertTrue($autopistasAsignadas->contains($autopista));

    }
}
