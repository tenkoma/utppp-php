<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Math;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Math\Decimal;

class DecimalTest extends TestCase
{
    #[Test]
    #[TestWith(['1', '1'])]
    #[TestWith(['1', '1.0'])]
    #[TestWith(['1.0', '1.0'])]
    #[TestWith(['-1', '-1'])]
    #[TestWith(['-1', '-1.0'])]
    #[TestWith(['-1.0', '-1.0'])]
    public function 等価である(string $value, string $expectedValue): void
    {
        $sut = Decimal::of($value);
        $this->assertTrue($sut->isEqualTo(Decimal::of($expectedValue)));
    }
}
