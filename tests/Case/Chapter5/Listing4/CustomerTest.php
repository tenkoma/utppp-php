<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter5\Listing4;

use Mockery;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter5\Listing4\Customer;
use Tenkoma\UtpppExample\Chapter5\Listing4\Product;
use Tenkoma\UtpppExample\Chapter5\Listing4\StoreInterface;

class CustomerTest extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    #[Test]
    public function Purchase_fails_when_not_enough_inventory(): void
    {
        /** @var Mockery\MockInterface&StoreInterface $storeMock */
        $storeMock = Mockery::mock(StoreInterface::class);
        $storeMock->allows([
            'hasEnoughInventory' => false,
        ]);
        $sut = new Customer();

        $success = $sut->purchase($storeMock, Product::Shampoo, 5);

        $this->assertFalse($success);
        $storeMock->shouldNotHaveReceived('removeInventory', [Product::Shampoo, 5]);
    }
}
