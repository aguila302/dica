<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AsignaAutopistasAusuarioTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_admin_asigna_autopista_a_un_usuarioVisitante()
    {
        $userAdmin     = createUserAdmin();
        $userVisitante = createUserVisitante();
        $autopista     = factory(Autopista::class)->create();

        $this->signIn($userAdmin);
        $this->visit("/usuarios/{$userVisitante->id}/modificar");
        $this->select($autopista->id, 'autopistas');
        $this->press('Asignar');

        $autopistasAsignadas = $userVisitante->autopistas;
        $this->assertTrue($autopistasAsignadas->contains($autopista));

    }
}
