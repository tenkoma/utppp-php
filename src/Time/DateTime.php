<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Time;

use Carbon\CarbonImmutable;

final class DateTime
{
    protected readonly CarbonImmutable $value;

    public function __construct(int $year, int $month, int $day)
    {
        $value = CarbonImmutable::create($year, $month, $day);
        if ($value === false) {
            throw new \InvalidArgumentException();
        }
        $this->value = $value;
    }

    public function isEqualTo(self $that): bool
    {
        return $this->value->equalTo($that->value);
    }
}
