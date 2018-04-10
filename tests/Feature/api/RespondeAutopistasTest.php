<?php

namespace Tests\Feature\api;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RespondeAutopistasTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function user_admin_puede_obtener_todas_las_autopistas()
    {
        $this->withExceptionHandling();

        $userAdmin = createUserAdmin();
        $autopista = factory(Autopista::class)->create();

        $this->get('api/autopistas', $this->headers($userAdmin))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    [
                        'id'                      => $autopista->id,
                        'nombre'                  => $autopista->nombre,
                        'cadenamiento_inicial_km' => $autopista->cadenamiento_inicial_km,
                        'cadenamiento_inicial_m'  => $autopista->cadenamiento_inicial_m,
                        'cadenamiento_final_km'   => $autopista->cadenamiento_final_km,
                        'cadenamiento_final_m'    => $autopista->cadenamiento_final_m,
                    ],
                ],
            ]);
    }

    /** @test */
    public function user_visitante_puede_obtener_autopistas_asignadas()
    {
        $this->withExceptionHandling();

        $userVisitante = createUserVisitante();
        $autopista     = factory(Autopista::class)->create();
        $userVisitante->asignaAutopista($autopista);

        $this->get('api/autopistas', $this->headers($userVisitante))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    [
                        'id'                      => $autopista->id,
                        'nombre'                  => $autopista->nombre,
                        'cadenamiento_inicial_km' => $autopista->cadenamiento_inicial_km,
                        'cadenamiento_inicial_m'  => $autopista->cadenamiento_inicial_m,
                        'cadenamiento_final_km'   => $autopista->cadenamiento_final_km,
                        'cadenamiento_final_m'    => $autopista->cadenamiento_final_m,
                    ],
                ],
            ]);
    }
}
