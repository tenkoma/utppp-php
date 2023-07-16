<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing1;

interface EmailGatewayInterface
{
    public function sendGreetingsEmail(string $userEmail): void;
}
