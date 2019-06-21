<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

Use App\Menus\PlatosDelDia;
use Faker\Generator as Faker;

$factory->define(PlatosDelDia::class, function (Faker $faker) {
    return [
        'restaurante_id'    =>  1,
        'nombre'            =>  $faker->sentence,
        'descripcion'       =>  $faker->paragraph,
        'plato_tipo'        =>  'tradicional',
    ];
});
