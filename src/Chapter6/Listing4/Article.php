<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter6\Listing4;

use Ramsey\Collection\Collection;
use Tenkoma\UtpppExample\Collection\ImmutableList;
use Tenkoma\UtpppExample\Time\DateTime;

class Article
{
    /** @var Collection<Comment> */
    private Collection $comments;

    public function __construct()
    {
        $this->comments = new Collection(Comment::class);
    }

    public function addComment(string $text, string $author, DateTime $dateCreated): void
    {
        $this->comments->add(new Comment($text, $author, $dateCreated));
    }

    /**
     * @return ImmutableList<Comment>
     */
    public function getComments(): ImmutableList
    {
        return ImmutableList::createFromCollection($this->comments->getType(), $this->comments);
    }
}
