<?php

namespace Tests\Feature;

use App\Autopista;
use App\Carril;
use App\Condicion;
use App\Cuerpo;
use App\Elemento;
use App\Inventario;
use App\SubElemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoLevantamientosTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_puede_ver_levantamientos_de_una_autopista()
    {
        $this->withExceptionHandling();

        $user        = createUserAdmin();
        $autopista   = factory(Autopista::class)->create();
        $elemento    = factory(Elemento::class)->create();
        $subElemento = factory(SubElemento::class)->create([
            'elemento_id' => $elemento->id,
        ]);
        $cuerpo    = factory(Cuerpo::class)->create();
        $condicion = factory(Condicion::class)->create();
        $carril    = factory(Carril::class)->create();

        $levantamiento = factory(Inventario::class)->create([
            'autopista_id'   => $autopista->id,
            'elemento_id'    => $elemento->id,
            'subElemento_id' => $subElemento->id,
            'cuerpo_id'      => $cuerpo->id,
            'condicion_id'   => $condicion->id,
            'carril_id'      => $carril->id,
        ]);

        $this->signIn($user);
        $this->visit("autopista/{$autopista->id}/levantamientos")
            ->see($levantamiento->elemento->descripcion)
            ->see($levantamiento->subelemento->descripcion)
            ->see($levantamiento->cuerpo->descripcion);
    }
}
