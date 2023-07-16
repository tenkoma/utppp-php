<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing12;

class User
{
    public function __construct(
        private int $userId,
        private string $email,
        private UserType $type,
        private bool $isEmailConfirmed,
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

    public function canChangeEmail(): Result
    {
        if ($this->isEmailConfirmed) {
            return Result::ng("Can't change a confirmed email");
        }

        return Result::ok();
    }

    public function changeEmail(
        string $newEmail,
        Company $company
    ): void {
        Precondition::requires($this->canChangeEmail()->isOk());

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
