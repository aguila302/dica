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
        $this->call(SubElementosTableSeeder::class);
        $this->call(AutopistaUserTableSeeder::class);
        $this->call(InventariosTableSeeder::class, 50);
    }
}
