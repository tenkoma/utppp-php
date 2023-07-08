<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing7;

class MessageRenderer implements RendererInterface
{
    public RendererCollection $subRenderers;

    public function __construct()
    {
        $this->subRenderers = new RendererCollection([
            new HeaderRenderer(),
            new BodyRenderer(),
            new FooterRenderer(),
        ]);
    }

    public function render(Message $message): string
    {
        return $this->subRenderers->map(
            fn(RendererInterface $renderer) => $renderer->render($message)
        )->reduce(
            fn(string $carry, string $item) => $carry . $item,
            ''
        );
    }
}
