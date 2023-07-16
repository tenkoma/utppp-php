<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing2;

class UserController
{
    private readonly Database $database;
    private readonly MessageBus $messageBus;

    public function __construct()
    {
        $this->database = new Database();
        $this->messageBus = new MessageBus();
    }

    public function changeEmail(int $userId, string $newEmail): void
    {
        $data = $this->database->getUserById($userId);
        $email = (string)$data[1];
        $type = UserType::from((string)$data[2]);
        $user = new User($userId, $email, $type);

        $companyData = $this->database->getCompany();
        $companyDomainName = (string)$companyData[0];
        $numberOfEmployees = (int)$companyData[1];

        $newNumberOfEmployees = $user->changeEmail(
            $newEmail,
            $companyDomainName,
            $numberOfEmployees
        );

        $this->database->saveCompany($newNumberOfEmployees);
        $this->database->saveUser($user);
        $this->messageBus->sendEmailChangedMessage($userId, $newEmail);
    }
}
