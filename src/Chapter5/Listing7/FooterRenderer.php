<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing7;

class FooterRenderer implements RendererInterface
{
    public function render(Message $message): string
    {
        return "<i>{$message->footer}</i>";
    }
}
