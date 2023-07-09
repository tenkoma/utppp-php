<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter6\Listing4;

use Tenkoma\UtpppExample\Time\DateTime;

class Comment
{
    public function __construct(
        public readonly string $text,
        public readonly string $author,
        public readonly DateTime $dateCreated
    ) {
    }
}
