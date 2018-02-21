<?php

use Illuminate\Database\Seeder;

class TipoElementosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Elemento::each(function ($elemento) {
            factory(App\TipoElemento::class, 5)->create([
                'elemento_id' => $elemento->id,
            ]);
        });
    }
}
