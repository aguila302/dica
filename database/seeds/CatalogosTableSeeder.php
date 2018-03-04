<?php

use Illuminate\Database\Seeder;

class CatalogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rolesUsuarios();
        factory(App\Autopista::class, 10)->create();
        factory(App\Elemento::class, 10)->create();
        factory(App\Carril::class, 4)->create();
        factory(App\Condicion::class, 3)->create();
        factory(App\Cuerpo::class, 4)->create();
        factory(App\User::class, 6)->create();
    }

    public function rolesUsuarios()
    {
        $userAdmin = factory(App\User::class)->create([
            'name'     => 'Usuario administrador',
            'email'    => 'admin@calymayor.com.mx',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        ]);

        $userAdmin->assignRole('admin');
    }
}
