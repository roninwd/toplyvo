<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $faker->company,
        'slug' => \Illuminate\Support\Str::slug($name, '_')
    ];
});
