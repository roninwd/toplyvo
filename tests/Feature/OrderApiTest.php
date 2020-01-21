<?php

namespace Tests\Feature;

use App\Entities\Order;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    private Order $order;

    protected function setUp(): void
    {
        parent::setUp();
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

        $this->post(route('order.store'), $data)->assertStatus(201);
    }

    public function testOrderUpdate(): void
    {
        $this->withoutExceptionHandling();
        $data = [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
        ];

        $this->put(route('order.update', $this->order), $data)->assertStatus(200);

    }

    public function testOrderChangeStatus(): void
    {
        $this->withoutExceptionHandling();
        $data = [
            'status' => Order::STATUS_PAID
        ];

        $this->put(route('order.change_status', $this->order), $data)->assertStatus(200);

    }

}
