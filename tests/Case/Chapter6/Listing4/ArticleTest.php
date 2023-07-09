<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Test\Case\Chapter6;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tenkoma\UtpppExample\Chapter6\Listing4\Article;
use Tenkoma\UtpppExample\Time\DateTime;

class ArticleTest extends TestCase
{
    #[Test]
    public function 記事にコメントを追加する(): void
    {
        $sut = new Article();
        $text = "Comment text";
        $author = "John Doe";
        $now = new DateTime(2019, 4, 1);

        $sut->addComment($text, $author, $now);

        $this->assertSame(1, count($sut->getComments()));
        $this->assertSame($text, $sut->getComments()[0]->text);
        $this->assertSame($author, $sut->getComments()[0]->author);
        $this->assertTrue($sut->getComments()[0]->dateCreated->isEqualTo($now));
    }
}
