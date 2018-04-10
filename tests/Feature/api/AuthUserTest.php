<?php

namespace Tests\Feature\api;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class AuthUserTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function user_admin_puede_autenticarse_en_el_api()
    {
        $this->withExceptionHandling();

        $userAdmin  = createUserAdmin();
        $autopistas = factory(Autopista::class)->create();

        $this->get('api/user', $this->headers($userAdmin))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    'id'    => $userAdmin->id,
                    'name'  => $userAdmin->name,
                    'email' => $userAdmin->email,
                    'role'  => $userAdmin->getRoleNames()->first(),
                ],
            ]);
    }

    /** @test */
    public function user_visitante_puede_autenticarse_en_el_api()
    {
        $this->withExceptionHandling();

        $userVisitante = createUserVisitante();
        $autopistas    = factory(Autopista::class)->create();

        $this->get('api/user', $this->headers($userVisitante))
            ->assertResponseOk()
            ->seeJsonSubset([
                'data' => [
                    'id'    => $userVisitante->id,
                    'name'  => $userVisitante->name,
                    'email' => $userVisitante->email,
                    'role'  => $userVisitante->getRoleNames()->first(),
                ],
            ]);
    }
}
