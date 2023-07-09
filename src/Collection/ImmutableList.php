<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Collection;

/**
 * @template TKey
 * @template TValue
 * @implements \ArrayAccess<TKey, TValue>
 */
class ImmutableList implements \ArrayAccess, \Countable
{
    /**
     * @param string $type
     * @param list<TValue> $elements
     */
    public function __construct(
        private readonly string $type,
        private readonly array $elements
    ) {
        foreach ($elements as $element) {
            if (!is_object($element) && gettype($element) === $type) {
                continue;
            }
            if (!$element instanceof $type) {
                throw new \InvalidArgumentException();
            }
        }
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->elements[$offset]);
    }

    /**
     * @param TKey $offset
     * @return TValue
     */
    public function offsetGet(mixed $offset): mixed
    {
        if (!$this->offsetExists($offset)) {
            throw new \OutOfBoundsException();
        }
        return $this->elements[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new \BadMethodCallException("Can't set element");
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new \BadMethodCallException("Can't unset element");
    }

    public function count(): int
    {
        return count($this->elements);
    }
}
