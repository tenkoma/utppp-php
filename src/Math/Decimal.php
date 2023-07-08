<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Math;

use Brick\Math\BigDecimal;

class Decimal
{
    protected function __construct(readonly BigDecimal $value)
    {
    }

    public static function of(string|int $value): self
    {
        return new self(BigDecimal::of($value));
    }

    public function isEqualTo(self $that): bool
    {
        return $this->value->isEqualTo($that->value);
    }

    public function multipliedBy(self $that): self
    {
        return new self($this->value->multipliedBy($that->value));
    }

    public function isGreaterThan(Decimal $that): bool
    {
        return $this->value->isGreaterThan($that->value);
    }
}
