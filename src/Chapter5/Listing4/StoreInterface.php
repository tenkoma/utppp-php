<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing4;

interface StoreInterface
{
    public function hasEnoughInventory(Product $product, int $quantity): bool;

    public function removeInventory(Product $product, int $quantity): void;
}
