<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing3;

class MessageBus
{
    private static BusInterface $bus;

    public static function get(): BusInterface
    {
        if (!isset(self::$bus)) {
            self::$bus = new Bus();
        }
        return self::$bus;
    }

    public static function sendEmailChangedMessage(int $userId, string $newEmail): void
    {
        self::get()->send("Subject: USER; Type: EMAIL CHANGED; Id: {$userId}; NewEmail: {$newEmail}");
    }
}
