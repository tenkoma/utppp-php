<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter5\Listing2;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter5\Listing2\Controller;
use Tenkoma\UtpppExample\Chapter5\Listing2\DatabaseInterface;

class ControllerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

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

        $this->assertEquals(10, $report->numberOfUsers);
    }
}
