<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class QuitaAutopistasAusuarioTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function usuario_admin_quita_autopista_a_un_usuarioVisitante()
    {
        $userAdmin     = createUserAdmin();
        $userVisitante = createUserVisitante();
        $autopista     = factory(Autopista::class)->create();
        $userVisitante->asignaAutopista($autopista);

        $this->signIn($userAdmin);
        $this->visit("/usuarios/{$userVisitante->id}/modificar");
        $this->press('Quitar');

        $autopistasAsignadas = $userVisitante->autopistas;
        $this->assertFalse($autopistasAsignadas->contains($autopista));

    }
}
