<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Order\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderRepository
{
    public function getAll(): LengthAwarePaginator
    {
        return Order::paginate();
    }

    public function create(Order $order, array $items): Order
    {
        $order->save();
        if (!empty($items)) {
            $order->items()->create($items);
        }
        return $order;
    }

    public function update(Order $order, array $data, array $items): Order
    {
        $order->update($data);
        if (!empty($items)) {
            $order->items()->delete();
            $order->items()->create($items);
        }
        return $order;
    }
}
