<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing6;

class UserController
{
    public function renameUser(int $userId, string $newName): void
    {
        $user = $this->getUserFromDatabase($userId);
        $user->setName($newName);
        $this->saveUserToDatabase($user);
    }

    private function saveUserToDatabase(User $user): void
    {
    }

    private function getUserFromDatabase(int $userId): User
    {
        return new User('John Smith');
    }
}
