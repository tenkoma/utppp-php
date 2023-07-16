<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Chapter7\Listing12;

use InvalidArgumentException;

class Result
{
    private function __construct(
        private readonly bool $isOk,
        private readonly ?string $message = null,
    ) {
        if (!$isOk && $message === null) {
            throw new InvalidArgumentException('message must be set when isOk is false');
        }
    }

    public static function ok(): self
    {
        return new self(true);
    }

    public static function ng(string $message): self
    {
        return new self(false, $message);
    }

    public function isOk(): bool
    {
        return $this->isOk;
    }

    public function isNg(): bool
    {
        return !$this->isOk();
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
