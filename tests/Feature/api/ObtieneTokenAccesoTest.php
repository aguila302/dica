<?php

namespace Tests\Feature\api;

use App\Autopista;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class ObtieneTokenAccesoTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    /** @test */
    public function obtiene_un_token_de_acceso_para_usuario()
    {
        $client = $this->createPasswordClient();

        $user = factory(User::class)->create([
            'email'    => 'admin@calymayor.com.mx',
            'password' => bcrypt('secret'),
        ]);
        $autopista = factory(Autopista::class)->create();

        $user->asignaAutopista($autopista);

        $this->json('POST', '/oauth/token', [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => 'admin@calymayor.com.mx',
            'password'      => 'secret',
        ]);

        $this->assertResponseStatus(200);
        $this->seeJsonStructure([
            'token_type',
            'expires_in',
            'access_token',
            'refresh_token',
        ]);
    }

    /** @test */
    public function ningun_token_es_obtenido_si_los_datos_de_acceso_son_incorrectos()
    {
        $client = $this->createPasswordClient();

        $this->json('POST', '/oauth/token', [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => 'email-falso',
            'password'      => 'password-falso',
        ]);

        $this->assertResponseStatus(401);
    }
}
