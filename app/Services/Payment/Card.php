<?php

declare(strict_types=1);

namespace App\Services\Payment;

use Webmozart\Assert\Assert;

class Card
{
    public string $number;
    public string $month;
    public string $year;
    public string $cvv;

    public function __construct(string $number, string $month, string $year, string $cvv)
    {
        Assert::notEmpty($number);
        Assert::notEmpty($month);
        Assert::notEmpty($year);
        Assert::notEmpty($cvv);

        $this->number = $number;
        $this->month = $month;
        $this->year = $year;
        $this->cvv = $cvv;
    }
}
