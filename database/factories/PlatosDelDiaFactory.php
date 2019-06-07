<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PlatosDelDia;
use Faker\Generator as Faker;

$factory->define(PlatosDelDia::class, function (Faker $faker) {
    return [
        'nombre'    =>  $faker->sentence
    ];
});
