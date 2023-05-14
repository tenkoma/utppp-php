<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter2\Listing1;

enum Product
{
    case Shampoo;
    case Book;

    public function toString(): string
    {
        return $this->name;
    }
}
