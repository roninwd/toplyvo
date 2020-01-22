<?php

declare(strict_types=1);

namespace App\Services\Payment;

interface Payable extends ICanSum
{
    public function getId(): int;
    public function getCurrency(): string;
}
