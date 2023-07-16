<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing1;

class Controller
{
    public function __construct(private EmailGatewayInterface $emailGateway)
    {
    }

    public function greetUser(string $userEmail): void
    {
        $this->emailGateway->sendGreetingsEmail($userEmail);
    }
}
