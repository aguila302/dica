<?php

namespace Tests\Feature;

use App\Elemento;
use App\SubElemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoSubElementosTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function ver_listado_de_sub_elementos()
    {
        $userAdmin = createUserAdmin();
        $this->withExceptionHandling()->signIn($userAdmin);

        $elemento     = factory(Elemento::class)->create();
        $subelementos = factory(SubElemento::class)->create([
            'elemento_id' => $elemento->id,
        ]);

        $this->visit("elementos/{$elemento->id}/componentes")
            ->see($subelementos->descripcion);
    }
}
