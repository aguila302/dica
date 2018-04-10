<?php

namespace Tests\Feature\api;

use App\Elemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RespondeElementosTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function obtiene_listado_de_elementos()
    {
        $this->withExceptionHandling();

        $userAdmin = createUserAdmin();
        $elemento  = factory(Elemento::class)->create();

        $this->get('api/elementos', $this->headers($userAdmin))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    [
                        'id'          => $elemento->id,
                        'descripcion' => $elemento->descripcion,
                    ],
                ],
            ]);
    }
}
