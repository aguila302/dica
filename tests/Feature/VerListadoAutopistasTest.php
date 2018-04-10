<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoAutopistasTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_admin_puede_ver_todas_las_autopistas()
    {
        $user = createUserAdmin();
        $this->signIn($user);

        $autopista = factory(Autopista::class)->create();
        $this->visit('/autopistas')
            ->see($autopista->nombre);
    }

    /** @test */
    public function ver_lista_de_autopistas_asignados_a_un_usuario_autenticado()
    {

        $user = createUserVisitante();

        $autopista = factory(Autopista::class)->create();
        $user->asignaAutopista($autopista);

        $this->signIn($user);
        $this->visit('/autopistas')
            ->see($autopista->nombre);
    }
}
