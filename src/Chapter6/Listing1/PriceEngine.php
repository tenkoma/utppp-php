<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter6\Listing1;

use Tenkoma\UtpppExample\Math\Decimal;

class PriceEngine
{
    /**
     * @param array<Product> $array
     * @return Decimal
     */
    public function calculateDiscount(array $array): Decimal
    {
        $discount = Decimal::of(count($array))->multipliedBy(Decimal::of('0.01'));
        $upperLimit = Decimal::of('0.2');

        return $discount->isGreaterThan($upperLimit) ? $upperLimit : $discount;
    }
}
