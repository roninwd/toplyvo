<?php

declare(strict_types=1);

namespace App\Services\Payment;

interface PaymentInterface
{
    public function __construct(string $public_key, string $private_key);
    public function payment(Payable $order, Card $data);
}
