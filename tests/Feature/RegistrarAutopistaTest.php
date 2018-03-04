<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RegistrarAutopistaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_admin_puede_registrar_autopista()
    {
        $role       = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'nueva autopista']);
        $role->givePermissionTo($permission);

        $user = factory(User::class)->create();
        $user->assignRole('admin');

        $this->actingAs($user)
            ->visit('/autopistas/registrar')
            ->type('México - Pachuca', 'nombre')
            ->type('000', 'cadenamiento_inicial')
            ->type('678', 'cadenamiento_final')
            ->press('Guardar')
            ->seePageIs('/autopistas');
    }

    /** @test */
    public function usuario_visitante_no_puede_registrar_autopista()
    {

    }
}
