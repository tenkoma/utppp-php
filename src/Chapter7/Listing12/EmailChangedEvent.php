<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing12;

class EmailChangedEvent
{
    public function __construct(
        public readonly int $userId,
        public readonly string $newEmail,
    ) {
    }
}
