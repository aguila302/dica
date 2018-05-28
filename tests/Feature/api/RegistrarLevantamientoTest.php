<?php

namespace Tests\Feature\api;

use App\Autopista;
use App\Carril;
use App\Condicion;
use App\Cuerpo;
use App\Elemento;
use App\Inventario;
use App\SubElemento;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Helpers\ApiHelpers;
use Tests\Helpers\ApiTokens;
use Tests\TestCase;

class RegistrarLevantamientoTest extends TestCase
{
    use DatabaseMigrations, ApiTokens, ApiHelpers;

    protected $autopista;
    protected $elemento;
    protected $subElemento;
    protected $cuerpo;
    protected $condicion;
    protected $carril;
    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->autopista   = factory(Autopista::class)->create();
        $this->elemento    = factory(Elemento::class)->create();
        $this->subElemento = factory(SubElemento::class)->create([
            'elemento_id' => $this->elemento->id,
        ]);
        $this->cuerpo    = factory(Cuerpo::class)->create();
        $this->condicion = factory(Condicion::class)->create();
        $this->carril    = factory(Carril::class)->create();

        $this->user = factory(User::class)->create();
    }

    // protected function assertValidationError($param = '')
    // {
    //     $this->assertResponseStatus(422);
    //     $this->seeJsonSubset([
    //         'error' => [
    //             'type'      => 'API-ERROR-VALIDACION',
    //             'http_code' => 422,
    //             'param'     => $param,
    //         ],
    //     ]);
    // }

    public function registrarLevantamiento($user, $params)
    {
        $this->json('POST', 'api/levantamiento', $params, $this->headers($user));
    }

    /** @test */
    public function registra_un_levantamiento()
    {
        $this->registrarLevantamiento($this->user, [
            'autopista_id'            => $this->autopista->id,
            'elemento_id'             => $this->elemento->id,
            'subelemento_id'          => $this->subElemento->id,
            'cuerpo_id'               => $this->cuerpo->id,
            'condicion_id'            => $this->condicion->id,
            'carril_id'               => $this->carril->id,
            'longitud_elemento'       => '3.45',
            'cadenamiento_inicial_km' => '123',
            'cadenamiento_inicial_m'  => '234',
            'cadenamiento_final_km'   => '240',
            'cadenamiento_final_m'    => '456',
            'estatus'                 => '2',
            'reportar'                => '0',
            'uuid'                    => 'loubb9R-c74b-50b0-aHe1-a51Gb0t14ea',
        ]);

        $this->assertResponseStatus(201);
        $this->seeJsonSubset([
            'id' => 1,
        ]);
        $this->seeInDatabase('inventarios', [
            'autopista_id'            => $this->autopista->id,
            'elemento_id'             => $this->elemento->id,
            'subelemento_id'          => $this->subElemento->id,
            'cuerpo_id'               => $this->cuerpo->id,
            'condicion_id'            => $this->condicion->id,
            'carril_id'               => $this->carril->id,
            'longitud_elemento'       => '3.45',
            'cadenamiento_inicial_km' => '123',
            'cadenamiento_inicial_m'  => '234',
            'cadenamiento_final_km'   => '240',
            'cadenamiento_final_m'    => '456',
            'estatus'                 => '2',
            'reportar'                => '0',
            'uuid'                    => 'loubb9R-c74b-50b0-aHe1-a51Gb0t14ea',
        ]);
    }

    /** @test */
    public function levantamiento_no_es_registrado_si_ya_existe_otro_levantamiento_con_el_mismo_uuid()
    {
        factory(Inventario::class)->create([
            'uuid' => 'loubb9R-c74b-50b0-aHe1-a51Gb0t14ea',
        ]);

        $this->registrarLevantamiento($this->user, [
            'autopista_id'            => $this->autopista->id,
            'elemento_id'             => $this->elemento->id,
            'subelemento_id'          => $this->subElemento->id,
            'cuerpo_id'               => $this->cuerpo->id,
            'condicion_id'            => $this->condicion->id,
            'carril_id'               => $this->carril->id,
            'longitud_elemento'       => '3.45',
            'cadenamiento_inicial_km' => '123',
            'cadenamiento_inicial_m'  => '234',
            'cadenamiento_final_km'   => '240',
            'cadenamiento_final_m'    => '456',
            'estatus'                 => '2',
            'reportar'                => '0',
            'uuid'                    => 'loubb9R-c74b-50b0-aHe1-a51Gb0t14ea',
        ]);

        $this->assertResponseStatus(422);
        $this->assertEquals(1, Inventario::where('uuid', 'loubb9R-c74b-50b0-aHe1-a51Gb0t14ea')->count());
    }

    /** @test */
    public function el_uuid_es_requerido_para_registrar_un_levantamiento()
    {
        $this->withExceptionHandling();

        $this->registrarLevantamiento($this->user, [
            'autopista_id'            => $this->autopista->id,
            'elemento_id'             => $this->elemento->id,
            'subelemento_id'          => $this->subElemento->id,
            'cuerpo_id'               => $this->cuerpo->id,
            'condicion_id'            => $this->condicion->id,
            'carril_id'               => $this->carril->id,
            'longitud_elemento'       => '3.45',
            'cadenamiento_inicial_km' => '123',
            'cadenamiento_inicial_m'  => '234',
            'cadenamiento_final_km'   => '240',
            'cadenamiento_final_m'    => '456',
            'estatus'                 => '2',
            'reportar'                => '0',
        ]);

        $this->assertResponseStatus(422);
        // $this->seeJsonSubset([
        //     'message' => 'The given data was invalid.',
        //     ['errors' => 'uuid' => 'El campo uuid es obligatorio.'],

        // ]);
        // $this->assertValidationError('uuid');
    }

}