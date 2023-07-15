<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing3;

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
        Company $company
    ): void {
        if ($this->email === $newEmail) {
            return;
        }

        $newType = $company->isEmailCorporate($newEmail)
            ? UserType::Employee
            : UserType::Customer;

        if ($this->type !== $newType) {
            $delta = $newType === UserType::Employee ? 1 : -1;
            $company->changeNumberOfEmployees($delta);
        }

        $this->email = $newEmail;
        $this->type = $newType;
    }
}
