<?php

use Faker\Generator as Faker;

$factory->define(\App\Producto::class, function (Faker $faker) {


    return [
        'nombre' => $faker->city,
        'marca' => $faker->company,
        'precio' => $faker->randomDigitNotNull,
        'detalle' => $faker->realText(150),
        'categoria' => $faker->domainName

    ];


});
