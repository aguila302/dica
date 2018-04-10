<?php

namespace Tests\Feature\api;

use App\Cuerpo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RespondeCuerposTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function obtener_listado_de_cuerpos()
    {
        $this->withExceptionHandling();

        $userAdmin = createUserAdmin();
        $cuerpos   = factory(Cuerpo::class)->create();

        $this->get('api/cuerpos', $this->headers($userAdmin))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    [
                        'id'          => $cuerpos->id,
                        'descripcion' => $cuerpos->descripcion,
                    ],
                ],
            ]);
    }
}
