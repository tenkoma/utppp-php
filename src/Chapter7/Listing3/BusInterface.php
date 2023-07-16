<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing3;

interface BusInterface
{
    public function send(string $string): void;
}
