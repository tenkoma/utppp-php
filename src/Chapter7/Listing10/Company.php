<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing10;

class Company
{
    public function __construct(
        private string $domainName,
        private int $numberOfEmployees,
    ) {
    }

    public function changeNumberOfEmployees(int $delta): void
    {
        Precondition::requires($this->numberOfEmployees + $delta >= 0);

        $this->numberOfEmployees += $delta;
    }

    public function isEmailCorporate(string $email): bool
    {
        $emailDomain = ((array)mb_split('@', $email))[1];
        return $emailDomain === $this->domainName;
    }

    public function getNumberOfEmployees(): int
    {
        return $this->numberOfEmployees;
    }
}
