<?php

namespace Tests\Feature;

use App\Autopista;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AutopistaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function ver_lista_de_autopistas_asignados_a_un_usuario_autenticado()
    {
        $user      = factory(User::class)->create();
        $autopista = factory(Autopista::class)->create();
        $user->asignaAutopista($autopista);

        $this->actingAs($user)
            ->visit('/autopistas')
            ->see($autopista->nombre);
    }

    /** @test */
}
