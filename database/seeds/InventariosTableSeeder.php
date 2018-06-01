<?php

use App\Autopista;
use App\Carril;
use App\Condicion;
use App\Cuerpo;
use App\Elemento;
use App\Inventario;
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
        // Autopista::each(function ($autopista) {
        Elemento::each(function ($elemento) {
            $cuerpo    = Cuerpo::get();
            $condicion = Condicion::get();
            $carril    = Carril::get();
            $autopista = Autopista::get();

            $elemento->subElementos()->each(function ($sub_elemento) use ($elemento, $autopista, $cuerpo, $condicion, $carril) {
                factory(Inventario::class)->create([
                    'autopista_id'   => rand(1, $autopista->count()),
                    'elemento_id'    => $elemento->id,
                    'subelemento_id' => rand(1, $sub_elemento->count()),
                    'cuerpo_id'      => rand(1, $cuerpo->count()),
                    'condicion_id'   => rand(1, $condicion->count()),
                    'carril_id'      => rand(1, $carril->count()),
                ]);
            });
        });
        // });
    }
}
