<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter2\Listing2;

class Customer
{
    public function purchase(StoreInterface $store, Product $product, int $quantity): bool
    {
        if (!$store->hasEnoughInventory($product, $quantity)) {
            return false;
        }

        $store->removeInventory($product, $quantity);
        return true;
    }
}
