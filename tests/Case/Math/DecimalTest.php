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
    #[TestWith([1, '1'])]
    #[TestWith([-1, '-1'])]
    public function 等価である(string|int $value, string|int $expectedValue): void
    {
        $sut = Decimal::of($value);

        $this->assertTrue($sut->isEqualTo(Decimal::of($expectedValue)));
    }

    #[Test]
    #[TestWith(['2', '3', '6'])]
    #[TestWith(['2', '0.3', '0.6'])]
    #[TestWith(['0.2', '0.3', '0.06'])]
    public function 積(string $one, string $two, string $expected): void
    {
        $sut = Decimal::of($one);

        $actual = $sut->multipliedBy(Decimal::of($two));
        $this->assertTrue($actual->isEqualTo(Decimal::of($expected)));
    }

    #[Test]
    #[TestWith(['2.5', '2', true])]
    #[TestWith(['2.5', '3', false])]
    #[TestWith(['2.5', '2.5', false])]
    public function より大きい(string $one, string $other, bool $expected): void
    {
        $sut = Decimal::of($one);

        $this->assertSame($expected, $sut->isGreaterThan(Decimal::of($other)));
    }
}
