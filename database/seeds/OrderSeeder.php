<?php

use App\Entities\Order\Order;
use App\Entities\Order\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        factory(Order::class, 8)->create()->each(static function (Order $order) {
            $order->items()->saveMany(factory(OrderItem::class, random_int(1, 5))->make());
        });
    }
}
