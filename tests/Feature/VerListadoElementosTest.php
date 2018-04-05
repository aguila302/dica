<?php

namespace Tests\Feature;

use App\Elemento;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoElementosTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function ver_listado_de_elementos()
    {
        $userAdmin = createUserAdmin();
        $this->withExceptionHandling()->signIn($userAdmin);

        $elementos = factory(Elemento::class)->create();
        $this->visit('/elementos')
            ->see($elementos->descripcion);
    }
}
