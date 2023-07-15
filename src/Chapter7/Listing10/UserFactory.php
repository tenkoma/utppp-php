<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing10;

class UserFactory
{
    /**
     * @param (int|string)[] $data
     */
    public static function create(array $data): User
    {
        Precondition::requires(count($data) >= 3);

        $id = (int)$data[0];
        $email = (string)$data[1];
        $type = UserType::from((string)$data[2]);

        return new User($id, $email, $type);
    }
}
