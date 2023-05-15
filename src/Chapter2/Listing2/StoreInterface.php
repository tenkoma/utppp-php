<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter2\Listing2;

interface StoreInterface
{
    public function hasEnoughInventory(Product $product, int $quantity): bool;

    public function removeInventory(Product $product, int $quantity): void;

    public function addInventory(Product $product, int $quantity): void;

    public function getInventory(Product $product): int;
}
