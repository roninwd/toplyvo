<?php

declare(strict_types=1);

namespace App\Services\Payment;

interface ICanSum
{
    public function getAmount(): int;
}
