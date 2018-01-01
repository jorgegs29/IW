<?php

use Faker as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Noticia::class, function (Faker\Generator $faker) {
    $faker=Faker\Factory::create('es_ES');

    return [
        'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'descripcion' => $faker->text($maxNbChars = 100),
        'juego' => $faker->word,
        'idUsuario' => $faker->numberBetween($min = 1, $max = 1)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $faker=Faker\Factory::create('es_ES');

    return [
        'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'idJuego' => $faker->numberBetween($min = 1, $max = 1),
        'idUsuario' => $faker->numberBetween($min = 1, $max = 1)
    ];
});

$factory->define(App\Mensaje::class, function (Faker\Generator $faker) {
    $faker=Faker\Factory::create('es_ES');

    return [
        'contenido' => $faker->text($maxNbChars = 100),
        'idPost' => $faker->numberBetween($min = 1, $max = 20),
        'idUsuario' => $faker->numberBetween($min = 1, $max = 1)
    ];
});
