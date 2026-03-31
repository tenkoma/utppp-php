<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter5\Listing7;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter5\Listing7\Message;
use Tenkoma\UtpppExample\Chapter5\Listing7\MessageRenderer;

class MessageRendererTest extends TestCase
{
    #[Test]
    public function メッセージを描画する(): void
    {
        $sut = new MessageRenderer();
        $message = new Message();
        $message->header = 'h';
        $message->body = 'b';
        $message->footer = 'f';

        $expected = '<i>h</i><i>b</i><i>f</i>';
        $this->assertSame($expected, $sut->render($message));
    }
}
