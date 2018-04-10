<?php

namespace Tests\Feature\api;

use App\Condicion;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RespondeCondicionesTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function obtener_listado_de_condiciones()
    {
        $this->withExceptionHandling();

        $userAdmin   = createUserAdmin();
        $condiciones = factory(Condicion::class)->create();

        $this->get('api/condiciones', $this->headers($userAdmin))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    [
                        'id'          => $condiciones->id,
                        'descripcion' => $condiciones->descripcion,
                    ],
                ],
            ]);
    }
}
