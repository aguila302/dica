<?php

use Illuminate\Database\Seeder;

class InventariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\AutopistaElemento::each(function ($autopista) {
            factory(App\Inventario::class, rand(2, 8))->create([
                'autopista_id'     => $autopista->autopista_id,
                'elemento_id'      => $autopista->elemento_id,
                'tipo_elemento_id' => App\TipoElemento::where('elemento_id', $autopista->autopista_id)->inRandomOrder()->first()->id,
                'cuerpo_id'        => rand(1, 4),
            ]);
        });
    }
}
