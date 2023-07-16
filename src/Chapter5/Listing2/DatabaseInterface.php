<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing2;

interface DatabaseInterface
{
    public function getNumberOfUsers(): int;
}
