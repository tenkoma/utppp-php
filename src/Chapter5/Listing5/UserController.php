<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing5;

class UserController
{
    public function renameUser(int $userId, string $newName): void
    {
        $user = $this->getUserFromDatabase($userId);
        $normalizedName = $user->normalizeName($newName);
        $user->name = $normalizedName;
        $this->saveUserToDatabase($user);
    }

    private function saveUserToDatabase(User $user): void
    {
    }

    private function getUserFromDatabase(int $userId): User
    {
        return new User();
    }
}
