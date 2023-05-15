<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter2\Listing2;

use Mockery;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter2\Listing2\Customer;
use Tenkoma\UtpppExample\Chapter2\Listing2\Product;
use Tenkoma\UtpppExample\Chapter2\Listing2\StoreInterface;

class CustomerTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    #[Test]
    public function purchaseSucceedsWhenEnoughInventory(): void
    {
        // Arrange
        /** @var Mockery\MockInterface&StoreInterface $storeMock */
        $storeMock = Mockery::spy(StoreInterface::class);
        $storeMock->allows([
            'hasEnoughInventory' => true,
        ]);
        $customer = new Customer();

        // Act
        $success = $customer->purchase($storeMock, Product::Shampoo, 5);

        // Assert
        $this->assertTrue($success);
        $storeMock->shouldHaveReceived(
            'removeInventory',
            [Product::Shampoo, 5]
        );
    }

    #[Test]
    public function purchaseFailsWhenNotEnoughInventory(): void
    {
        // Arrange
        /** @var Mockery\MockInterface&StoreInterface $storeMock */
        $storeMock = Mockery::spy(StoreInterface::class);
        $storeMock->allows([
            'hasEnoughInventory' => false,
        ]);
        $customer = new Customer();

        // Act
        $success = $customer->purchase($storeMock, Product::Shampoo, 5);

        // Assert
        $this->assertFalse($success);
        $storeMock->shouldNotHaveReceived(
            'removeInventory',
            [Product::Shampoo, 5]
        );
    }
}
