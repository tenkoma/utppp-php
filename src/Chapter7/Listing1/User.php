<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing1;

class User
{
    private int $userId;
    private string $email;
    private UserType $type;

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

    public function changeEmail(int $userId, string $newEmail): void
    {
        $data = Database::getUserById($userId);
        $this->userId = $userId;
        $this->email = (string)$data[1];
        $this->type = UserType::from((string)$data[2]);

        if ($this->email === $newEmail) {
            return;
        }

        $companyData = Database::getCompany();
        $companyDomainName = (string)$companyData[0];
        $numberOfEmployees = (int)$companyData[1];

        $emailDomain = ((array)mb_split('@', $newEmail))[1];
        $isEmailCorporate = $emailDomain === $companyDomainName;
        $newType = $isEmailCorporate
            ? UserType::Employee
            : UserType::Customer;

        if ($this->type !== $newType) {
            $delta = $newType === UserType::Employee ? 1 : -1;
            $newNumber = $numberOfEmployees + $delta;
            Database::saveCompany($newNumber);
        }

        $this->email = $newEmail;
        $this->type = $newType;

        Database::saveUser($this);
        MessageBus::sendEmailChangedMessage($userId, $newEmail);
    }
}
