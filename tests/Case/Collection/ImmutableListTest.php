<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Collection;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Collection\ImmutableList;

class ImmutableListTest extends TestCase
{
    #[Test]
    public function issetIndex(): void
    {
        $sut = new ImmutableList('integer', [1, 2, 3]);

        $this->assertTrue(isset($sut[0]));
        $this->assertTrue(isset($sut[1]));
        $this->assertTrue(isset($sut[2]));
        $this->assertFalse(isset($sut[3]));
    }

    #[Test]
    public function referenceByIndex(): void
    {
        $sut = new ImmutableList('integer', [1, 2, 3]);

        $this->assertSame(1, $sut[0]);
        $this->assertSame(2, $sut[1]);
    }

    #[Test]
    public function countable(): void
    {
        $sut = new ImmutableList('integer', [1, 2, 3]);

        $this->assertSame(3, count($sut));
    }
}
