<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter2\Listing1;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter2\Listing1\Customer;
use Tenkoma\UtpppExample\Chapter2\Listing1\Product;
use Tenkoma\UtpppExample\Chapter2\Listing1\Store;

class CustomerTest extends TestCase
{
    #[Test]
    public function purchaseSucceedsWhenEnoughInventory(): void
    {
        // Arrange
        $store = new Store();
        $store->addInventory(Product::Shampoo, 10);
        $customer = new Customer();

        // Act
        $success = $customer->purchase($store, Product::Shampoo, 5);

        // Assert
        $this->assertTrue($success);
        $this->assertSame(5, $store->getInventory(Product::Shampoo));
    }

    #[Test]
    public function purchaseFailsWhenNotEnoughInventory(): void
    {
        // Arrange
        $store = new Store();
        $store->addInventory(Product::Shampoo, 10);
        $customer = new Customer();

        // Act
        $success = $customer->purchase($store, Product::Shampoo, 15);

        // Assert
        $this->assertFalse($success);
        $this->assertSame(10, $store->getInventory(Product::Shampoo));
    }
}
