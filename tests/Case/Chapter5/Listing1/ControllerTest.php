<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter5\Listing1;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter5\Listing1\Controller;
use Tenkoma\UtpppExample\Chapter5\Listing1\EmailGatewayInterface;

class ControllerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    #[Test]
    public function Sending_a_greetings_email(): void
    {
        /** @var Mockery\MockInterface&EmailGatewayInterface&Mockery\LegacyMockInterface $mock */
        $mock = Mockery::spy(EmailGatewayInterface::class);
        $sut = new Controller($mock);

        $sut->greetUser('user@email.com');

        $mock->shouldHaveReceived(
            'sendGreetingsEmail',
            ['user@email.com']
        );
    }
}
