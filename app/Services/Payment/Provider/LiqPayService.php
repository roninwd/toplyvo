<?php

declare(strict_types=1);

namespace App\Services\Payment\Provider;

use App\Services\Payment\Card;
use App\Services\Payment\Payable;
use App\Services\Payment\PaymentInterface;
use LiqPay;
use Webmozart\Assert\Assert;

// класс для примера
class LiqPayService implements PaymentInterface
{
    private LiqPay $service;

    public function __construct(string $public_key, string $private_key)
    {
        Assert::notEmpty($public_key);
        Assert::notEmpty($private_key);
        $this->service = new LiqPay($public_key, $private_key);
    }

    public function payment(Payable $order, Card $card): void
    {
        $this->service->api('request', [
            'action' => 'p2p',
            'version' => '3',
            'amount' => $order->getAmount(),
            'currency' => $order->getCurrency(),
            'description' => 'test',
            'order_id' => $order->getId(),
            'receiver_card' => config('services.payment.card'),
            'card' => $card->number,
            'card_exp_month' => $card->month,
            'card_exp_year' => $card->year,
            'card_cvv' => $card->cvv
        ]);
    }
}
