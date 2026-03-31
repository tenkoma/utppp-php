<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing5;

class User
{
    public string $name;

    public function normalizeName(string $name): string
    {
        $result = trim($name);
        if (mb_strlen($name) > 50) {
            return mb_substr($name, 0, 50);
        }
        return $result;
    }
}
