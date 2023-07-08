<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter5\Listing3;

use Mockery;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter5\Listing3\Controller;
use Tenkoma\UtpppExample\Chapter5\Listing3\DatabaseInterface;

class ControllerTest extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    #[Test]
    public function Creating_a_report(): void
    {
        /** @var DatabaseInterface&Mockery\MockInterface $stub */
        $stub = Mockery::mock(DatabaseInterface::class);
        $stub->allows([
            'getNumberOfUsers' => 10,
        ]);
        $sut = new Controller($stub);

        $report = $sut->createReport();

        $this->assertSame(10, $report->numberOfUsers);
        $stub->shouldHaveReceived('getNumberOfUsers');
    }
}
