<?php

use App\Autopista;
use App\User;
use Illuminate\Database\Seeder;

class AutopistaUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autopista::each(function ($autopista) {
            User::each(function ($user) use ($autopista) {
                $user->asignaAutopista($autopista);
            });
        });
    }
}
