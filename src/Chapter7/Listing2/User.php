<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing2;

class User
{
    public function __construct(
        private int $userId,
        private string $email,
        private UserType $type
    ) {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getType(): UserType
    {
        return $this->type;
    }

    public function changeEmail(
        string $newEmail,
        string $companyDomainName,
        int $numberOfEmployees,
    ): int {
        if ($this->email === $newEmail) {
            return $numberOfEmployees;
        }

        $emailDomain = ((array)mb_split('@', $newEmail))[1];
        $isEmailCorporate = $emailDomain === $companyDomainName;
        $newType = $isEmailCorporate
            ? UserType::Employee
            : UserType::Customer;

        if ($this->type !== $newType) {
            $delta = $newType === UserType::Employee ? 1 : -1;
            $newNumber = $numberOfEmployees + $delta;
            $numberOfEmployees = $newNumber;
        }

        $this->email = $newEmail;
        $this->type = $newType;

        return $numberOfEmployees;
    }
}
