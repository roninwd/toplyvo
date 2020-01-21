<?php

namespace App\Http\Controllers\Api\v1;

use App\Entities\Order;
use App\Http\Controllers\Controller;
use App\Jobs\CreatePayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handle(Request $request, Order $order)
    {
        CreatePayment::dispatch($order, $request)->delay(now()->addMinute());
        return api_response('Queued for payment. Order #' . $order->id, 202);
    }
}
