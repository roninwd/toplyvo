<?php


use App\Entities\Order\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Order::class, static function (Faker $faker) {
    return [
        'status' => Arr::random(Order::getStatuses()),
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->email,
        'country' => $faker->country,
        'city' => $faker->city,
        'street' => $faker->streetAddress,
    ];
});
