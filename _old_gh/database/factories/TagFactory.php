<?php

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {

    $type = array_random(array_keys(Tag::TYPES));

    $meta = [];
    if ($type === Tag::TYPE_AUTHOR) {
        $meta[Tag::META_PHOTO] = $faker->url;
        $meta[Tag::META_WIKI]  = $faker->url;
    }

    return [
        'type' => $type,
        'name' => ($type == Tag::TYPE_AUTHOR) ? $faker->name : $faker->word,
        'meta' => json_encode($meta, JSON_FORCE_OBJECT),
    ];
});
