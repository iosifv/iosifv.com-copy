<?php

use Faker\Generator as Faker;


$factory->define(App\Quote::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(300),
        'slug' => str_limit(implode('-', $faker->words(rand(2, 5))),45),
        'description' => $faker->text(200),
    ];
});
