<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing7;

interface RendererInterface
{
    public function render(Message $message): string;
}
