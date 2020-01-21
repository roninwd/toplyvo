<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Order;
use App\Http\Resources\Admin\AllOrdersResource;
use App\Http\Resources\Admin\OrderResource;
use App\Repositories\OrderRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderService
{
    private OrderRepository $repo;

    public function __construct(OrderRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll(): AnonymousResourceCollection
    {
        return AllOrdersResource::collection($this->repo->getAll());
    }

    public function getOne(Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    public function store(array $data, array $items = []): Order
    {
        $order = Order::make($data);
        $order->changeStatus(Order::STATUS_WAIT_PAYMENT);
        return $this->repo->create($order, $items);
    }

    public function update(Order $order, array $data, array $items = []): Order
    {
        return $this->repo->update($order, $data, $items);
    }
}
