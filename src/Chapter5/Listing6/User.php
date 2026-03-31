<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing6;

class User
{
    public function __construct(
        private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $this->normalizeName($name);
    }

    private function normalizeName(string $name): string
    {
        $result = trim($name);
        if (mb_strlen($name) > 50) {
            return mb_substr($name, 0, 50);
        }
        return $result;
    }
}
