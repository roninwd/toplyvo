<?php

namespace Tests\Feature;

use App\Entities\Order\Order;
use App\Services\OrderService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    private OrderService $service;
    private Order $order;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = app(OrderService::class);
        $this->order = factory(Order::class)->create([
            'status' => Order::STATUS_WAIT_PAYMENT
        ]);
    }

    public function testOrderSave(): void
    {
        $data = [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
        ];
        $order = $this->service->store($data);

        $this->assertTrue($order->isWait());
    }

    public function testOrderUpdate(): void
    {
        $data = [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
        ];
        $order = $this->service->update($this->order, $data);

        $this->assertEquals($data['name'], $order->name);
    }

    public function testOrderChangeStatus(): void
    {
        $data = [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
        ];
        $order = $this->service->update($this->order, $data);

        $this->assertTrue($order->isWait());
        $order->changeStatus(Order::STATUS_PAID);
        $this->assertTrue($order->isPaid());
    }
}
