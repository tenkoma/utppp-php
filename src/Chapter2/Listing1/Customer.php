<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter2\Listing1;

class Customer
{
    public function purchase(Store $store, Product $product, int $quantity): bool
    {
        if (!$store->hasEnoughInventory($product, $quantity)) {
            return false;
        }

        $store->removeInventory($product, $quantity);
        return true;
    }
}
