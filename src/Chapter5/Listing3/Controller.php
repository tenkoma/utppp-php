<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing3;

class Controller
{
    public function __construct(private DatabaseInterface $database)
    {
    }

    public function createReport(): Report
    {
        return new Report($this->database->getNumberOfUsers());
    }
}
