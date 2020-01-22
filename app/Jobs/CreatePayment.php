<?php

namespace App\Jobs;

use App\Entities\Order\Order;
use App\Services\Payment\Card;
use App\Services\Payment\PaymentInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePayment implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private Order $order;
    private PaymentInterface $payment;
    private Card $card;

    public function __construct(Order $order, PaymentInterface $payment, Card $card)
    {
        $this->order = $order;
        $this->payment = $payment;
        $this->card = $card;
    }

    public function handle()
    {
        $this->payment->payment($this->order, $this->card);
        $this->order->changeStatus(Order::STATUS_PAID);
    }
}
