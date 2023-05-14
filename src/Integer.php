<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample;

class Integer
{
	public function __construct(private int $value)
	{
	}

	public function toInt(): int
	{
		return $this->value;
	}

	public function add(self $augend): self
	{
		return new self($this->value + $augend->value);
	}
}
