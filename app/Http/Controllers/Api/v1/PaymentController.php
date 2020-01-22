<?php

namespace App\Http\Controllers\Api\v1;

use App\Entities\Order\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Jobs\CreatePayment;
use App\Services\Payment\Card;
use App\Services\Payment\Provider\LiqPayService;

class PaymentController extends Controller
{
    public function handle(PaymentRequest $request, Order $order)
    {
        $card = new Card(
            $request->get('number', '4242424242424242'),
            $request->get('month', '03'),
            $request->get('year', '22'),
            $request->get('cvv', '111')
        );

        CreatePayment::dispatch(
            $order,
            new LiqPayService(config('services.payment.public'), config('services.payment.private')),
            $card
        );
        return api_response('Queued for payment. Order #' . $order->id, 202);
    }
}
