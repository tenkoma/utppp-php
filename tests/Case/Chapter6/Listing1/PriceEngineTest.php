<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter6\Listing1;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter6\Listing1\PriceEngine;
use Tenkoma\UtpppExample\Chapter6\Listing1\Product;
use Tenkoma\UtpppExample\Math\Decimal;

class PriceEngineTest extends TestCase
{
    #[Test]
    public function 商品が2個ある場合の割引率(): void
    {
        $product1 = new Product("Hand wash");
        $product2 = new Product("Shampoo");
        $sut = new PriceEngine();

        $discount = $sut->calculateDiscount([$product1, $product2]);

        $this->assertTrue($discount->isEqualTo(Decimal::of('0.02')));
    }
}
