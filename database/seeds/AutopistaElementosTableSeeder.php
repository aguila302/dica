<?php

use Illuminate\Database\Seeder;

class AutopistaElementosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Autopista::each(function ($autopista) {
            App\Elemento::each(function ($elemento) use ($autopista) {
                factory(App\AutopistaElemento::class, 2)->create([
                    'autopista_id' => $autopista->id,
                    'elemento_id'  => $elemento->id,
                ]);
            });
        });
    }
}
