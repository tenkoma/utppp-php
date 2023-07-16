<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing3;

class Database
{
    /**
     * @return array{int, string, string}
     */
    public static function getUserById(int $userId): array
    {
        return [
            1,
            'john@example.com',
            'Employee',
        ];
    }

    /**
     * @return array{string, int}
     */
    public static function getCompany(): array
    {
        return [
            'example.com',
            100,
        ];
    }

    public static function saveCompany(Company $company): void
    {
    }

    public static function saveUser(User $user): void
    {
    }
}
