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
        User::each(function ($user) {
            $autopista = Autopista::get()->take(rand(2, 9));
            $user->asignaAutopista($autopista);
        });
    }
}
