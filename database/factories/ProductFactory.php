<?php

/** @var Factory $factory */

use App\Entities\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->words(2, true);
    return [
        'name' => $name,
        'price' => random_int(100, 1500),
        'slug' => \Illuminate\Support\Str::slug($name, '_')
    ];
});
