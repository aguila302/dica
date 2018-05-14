<?php

use App\Elemento;
use Illuminate\Database\Seeder;

class SubElementosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SubElementos = array('Raya continua', 'Raya discontinua', 'Raya continua doble', 'Raya continua - discontinua', 'Rayas con espaciamiento logarítmico', 'Rayas canalizadoras', 'Botón reflejante una cara', 'Botón reflejante dos caras', 'Botones luminosos (alimentados por electricidad)', 'Botones reflejantes sobre estructuras (ménsulas)', 'Flechas, letras, números para regular uso de carriles', 'Marcas para estacionamiento', 'Marcas en estructuras', 'Marcas en objetos adyacentes al camino (árboles o piedras grandes)', 'Otros');

        Elemento::each(function ($elemento) use ($SubElementos) {
            foreach ($SubElementos as &$SubElemento) {
                factory(App\SubElemento::class)->create([
                    'descripcion' => $SubElemento,
                    'elemento_id' => $elemento->id,
                ]);
            }
        });
    }
}
