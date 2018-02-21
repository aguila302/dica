<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CatalogosTableSeeder::class);
        $this->call(AutopistaElementosTableSeeder::class);
        $this->call(TipoElementosTableSeeder::class);
        $this->call(AutopistaUserTableSeeder::class);
    }
}
