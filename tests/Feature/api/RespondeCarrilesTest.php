<?php

namespace Tests\Feature\api;

use App\Carril;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RespondeCarrilesTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function obtener_listado_de_carriles()
    {
        $this->withExceptionHandling();

        $userAdmin = createUserAdmin();
        $carriles  = factory(Carril::class)->create();

        $this->get('api/carriles', $this->headers($userAdmin))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    [
                        'id'          => $carriles->id,
                        'descripcion' => $carriles->descripcion,
                    ],
                ],
            ]);
    }
}
