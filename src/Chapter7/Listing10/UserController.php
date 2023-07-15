<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing10;

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
        $userData = $this->database->getUserById($userId);
        $user = UserFactory::create($userData);

        $companyData = $this->database->getCompany();
        $company = CompanyFactory::create($companyData);

        if ($user->canChangeEmail()->isOk()) {
            $user->changeEmail($newEmail, $company);
        }

        $this->database->saveCompany($company);
        $this->database->saveUser($user);
        $this->messageBus->sendEmailChangedMessage($userId, $newEmail);
    }
}
