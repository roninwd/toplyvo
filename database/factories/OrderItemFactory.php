<?php


use App\Entities\OrderItem;
use App\Entities\Product;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(OrderItem::class, static function () {
    $product = Product::inRandomOrder()->first();
    return [
        'product_id' => $product->id,
        'count' => random_int(1, 5),
        'price' => $product->price,
    ];
});
