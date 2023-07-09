<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter2\Listing1;

use Tenkoma\UtpppExample\Collection\Dictionary;

class Store
{
    /** @var Dictionary<Product, int> */
    private Dictionary $inventory;

    public function __construct()
    {
        $this->inventory = new Dictionary();
    }

    public function hasEnoughInventory(Product $product, int $quantity): bool
    {
        return $this->getInventory($product) >= $quantity;
    }

    public function removeInventory(Product $product, int $quantity): void
    {
        if (!$this->inventory->containsKey($product)) {
            throw new \InvalidArgumentException('Not enough inventory');
        }

        $this->inventory->set($product, $this->inventory->get($product) - $quantity);
    }

    public function addInventory(Product $product, int $quantity): void
    {
        if ($this->inventory->containsKey($product)) {
            $this->inventory->set($product, $this->inventory->get($product) + $quantity);
            return;
        }

        $this->inventory->set($product, $quantity);
    }

    public function getInventory(Product $product): int
    {
        if (!$this->inventory->containsKey($product)) {
            return 0;
        }

        return $this->inventory->get($product);
    }
}
