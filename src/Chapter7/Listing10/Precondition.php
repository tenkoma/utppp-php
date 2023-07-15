<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing10;

class Precondition
{
    public static function requires(
        bool $precondition,
        ?string $message = null
    ): void {
        if (!$precondition) {
            throw new \LogicException($message ?? 'Precondition failed');
        }
    }
}
