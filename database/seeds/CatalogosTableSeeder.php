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
        factory(App\Autopista::class, 10)->create();
        factory(App\Elemento::class, 10)->create();
        factory(App\Carril::class, 4)->create();
        factory(App\Condicion::class, 3)->create();
        factory(App\Cuerpo::class, 4)->create();
        factory(App\User::class, 6)->create();
    }
}
