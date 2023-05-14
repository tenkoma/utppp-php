<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Unit\Case;

use Tenkoma\UtpppExample\Integer;
use Tenkoma\UtpppExample\Test\Unit\TestCase;

class IntegerTest extends TestCase
{
    public function testToInt(): void
    {
        $sut = new Integer(1);
        $this->assertSame(1, $sut->toInt());

        $sut = new Integer(2);
        $this->assertSame(2, $sut->toInt());
    }

    public function testAdd(): void
    {
        $sut = new Integer(1);
        $this->assertSame(3, $sut->add(new Integer(2))->toInt());
    }
}
