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
        'username'       => $faker->unique()->username,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Autopista::class, function (Faker $faker) {
    return [
        'nombre'                  => $faker->streetAddress,
        'cadenamiento_inicial_km' => $faker->numberBetween($min = 100, $max = 300),
        'cadenamiento_inicial_m'  => $faker->numberBetween($min = 100, $max = 400),

        'cadenamiento_final_km'   => $faker->numberBetween($min = 300, $max = 500),
        'cadenamiento_final_m'    => $faker->numberBetween($min = 100, $max = 400),
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

$factory->define(App\SubElemento::class, function (Faker $faker) {
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

$factory->define(App\Inventario::class, function (Faker $faker) {
    return [
        'autopista_id'         => function () {
            return factory(App\Autopista::class)->create()->id;
        },
        'elemento_id'          => function () {
            return factory(App\Elemento::class)->create()->id;
        },
        'subelemento_id'       => function () {
            return factory(App\SubElemento::class)->create()->id;
        },
        'cuerpo_id'            => function () {
            return factory(App\Cuerpo::class)->create()->id;
        },
        'condicion_id'         => function () {
            return factory(App\Condicion::class)->create()->id;
        },
        'carril_id'            => function () {
            return factory(App\Carril::class)->create()->id;
        },
        'longitud_elemento'    => $faker->randomFloat($nbMaxDecimals = 2, $min = 6, $max = 14),
        'cadenamiento_inicial' => $faker->numberBetween($min = 100, $max = 300),
        'cadenamiento_final'   => $faker->numberBetween($min = 300, $max = 700),
        'reportar'             => true,
        'observaciones'        => $faker->sentence,
        'recomendaciones'      => $faker->sentence,
        'estatus'              => $faker->randomElement($array = array('0', '1')),
        'seguimiento'          => $faker->randomElement($array = array('0', '1')),
    ];
});
