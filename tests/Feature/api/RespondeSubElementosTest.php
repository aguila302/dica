<?php

namespace Tests\Feature\api;

use App\Elemento;
use App\SubElemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RespondeSubElementosTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function obtiene_listado_de_sub_elementos()
    {
        $this->withExceptionHandling();

        $userAdmin = createUserAdmin();
        $elemento  = factory(Elemento::class)->create();

        $subelemento = factory(SubElemento::class)->create([
            'elemento_id' => $elemento->id,
        ]);

        $this->get('api/subelementos', $this->headers($userAdmin));

        $this->seeJsonSubset([
            'data' => [
                [
                    'id'          => $subelemento->id,
                    'descripcion' => $subelemento->descripcion,
                    'elemento'    => [
                        'data' => [
                            'id'          => $elemento->id,
                            'descripcion' => $elemento->descripcion,
                        ],
                    ],
                ],
            ],
        ]);
    }
}
