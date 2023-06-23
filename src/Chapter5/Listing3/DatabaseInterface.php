<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing3;

interface DatabaseInterface
{
    public function getNumberOfUsers(): int;
}
