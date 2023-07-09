<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Collection;

use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Collection\Dictionary;

class DictionaryTest extends TestCase
{
    public function testSet(): void
    {
        $sut = new Dictionary();
        $sut->set('key1', 1);
        $this->assertSame(1, $sut->get('key1'));
        $sut->set('key2', 1);
        $this->assertSame(1, $sut->get('key2'));
    }

    public function testGetNonExistKey(): void
    {
        $sut = new Dictionary();

        $this->expectException(\BadMethodCallException::class);
        $sut->get('key');
    }

    public function testContainsKey(): void
    {
        $sut = new Dictionary();
        $sut->set('exists-key', 1);
        $this->assertTrue($sut->containsKey('exists-key'));
        $this->assertFalse($sut->containsKey('non-exists-key'));
    }
}
