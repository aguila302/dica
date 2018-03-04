<?php

namespace Tests\Unit;

use App\Autopista;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function asigna_autopistas_a_un_usuario()
    {
        $user               = factory(User::class)->create();
        $autopistaAsignadaA = factory(Autopista::class)->create();
        $autopistaAsignadaB = factory(Autopista::class)->create();

        $user->asignaAutopista([$autopistaAsignadaA->id, $autopistaAsignadaB->id]);

        $autopistasAsignadas = $user->autopistas;
        $this->assertTrue($autopistasAsignadas->contains($autopistaAsignadaA));
        $this->assertTrue($autopistasAsignadas->contains($autopistaAsignadaB));
    }

    /** @test */
    public function quita_autopistas_a_un_usuario()
    {
        $user               = factory(User::class)->create();
        $autopistaAsignadaA = factory(Autopista::class)->create();
        $autopistaAsignadaB = factory(Autopista::class)->create();

        $user->asignaAutopista([$autopistaAsignadaA->id, $autopistaAsignadaB->id]);
        $user->quitaAutopista([$autopistaAsignadaA->id, $autopistaAsignadaB->id]);

        $autopistasAsignadas = $user->autopistas;
        $this->assertFalse($autopistasAsignadas->contains($autopistaAsignadaA));
        $this->assertFalse($autopistasAsignadas->contains($autopistaAsignadaB));
    }
}
