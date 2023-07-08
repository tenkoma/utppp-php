<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter5\Listing7;

use Ramsey\Collection\AbstractCollection;

/**
 * @extends  AbstractCollection<RendererInterface>
 */
class RendererCollection extends AbstractCollection
{
    public function getType(): string
    {
        return RendererInterface::class;
    }
}
