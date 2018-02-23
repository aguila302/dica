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
        Elemento::each(function ($elemento) {
            factory(App\SubElemento::class, 5)->create([
                'elemento_id' => $elemento->id,
            ]);
        });
    }
}
