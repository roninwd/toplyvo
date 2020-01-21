<?php

namespace App\Jobs;

use App\Entities\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePayment implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private Order $order;

    public function __construct(Order $order, Request $request)
    {
        $this->order = $order;
    }

    public function handle()
    {
        //todo payment
        $this->order->changeStatus(Order::STATUS_PAID);
    }
}
