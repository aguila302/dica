<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class QuitaAutopistasAusuarioTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function usuario_admin_quita_autopista_a_un_usuario()
    {
        $userAdmin = createUserAdmin();
        $user      = createUserCaptura();
        $autopista = factory(Autopista::class)->create();
        $user->asignaAutopista($autopista);

        $this->signIn($userAdmin);
        $this->visit("/usuarios/{$user->id}/modificar");
        $this->press('Quitar');

        $autopistasAsignadas = $user->autopistas;
        $this->assertFalse($autopistasAsignadas->contains($autopista));

    }
}
