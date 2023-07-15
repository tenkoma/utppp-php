<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing2;

interface BusInterface
{
    public function send(string $string): void;
}
