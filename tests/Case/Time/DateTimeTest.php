<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Time;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Time\DateTime;

class DateTimeTest extends TestCase
{
    #[Test]
    #[TestWith([2019, 4, 1, 2019, 4, 1, true])]
    #[TestWith([2019, 4, 1, 2019, 4, 2, false])]
    public function isEqualTo(
        int $year1,
        int $month1,
        int $day1,
        int $year2,
        int $month2,
        int $day2,
        bool $expected
    ): void {
        $sut = new DateTime($year1, $month1, $day1);

        $another = new DateTime($year2, $month2, $day2);
        $this->assertSame($expected, $sut->isEqualTo($another));
    }
}
