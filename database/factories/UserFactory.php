<?php
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Autopista::class, function (Faker $faker) {
    return [
        'nombre'               => $faker->streetAddress,
        'cadenamiento_inicial' => $faker->numberBetween($min = 100, $max = 300),
        'cadenamiento_final'   => $faker->numberBetween($min = 300, $max = 700),
    ];
});

$factory->define(App\Elemento::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});

$factory->define(App\Cuerpo::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});

$factory->define(App\Carril::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});

$factory->define(App\Condicion::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});

$factory->define(App\AutopistaElemento::class, function (Faker $faker) {
    return [
        'autopista_id' => function () {
            return factory(App\Autopista::class)->create()->id;
        },
        'elemento_id'  => function () {
            return factory(App\Elemento::class)->create()->id;
        },
    ];
});

// $autopistas = factory(App\Autopista::class, 5)->create();
// $elementos  = factory(App\Elemento::class, 5)->create();

// $autopistas->each(function ($autopista) use($elementos) {
//     $elementos->each(function ($elemento) use ($autopista) {
//         factory(App\AutopistaElemento::class, 10)->create([
//             'autopista_id' => $autopista->id,
//             'elemento_id'  => $elemento->id,
//         ]);
//     });
// });

$factory->define(App\TipoElemento::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'elemento_id' => function () {
            return factory(App\Elemento::class)->create()->id;
        },
    ];
});

// $elementos->each(function ($elemento) {
//     factory(App\TipoElemento::class, 10)->create([
//         'elemento_id' => $elemento->id,
//     ]);
// });
