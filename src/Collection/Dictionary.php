<?php

declare(strict_types=1);

namespace Tenkoma\UtpppExample\Collection;

/**
 * @template TKey
 * @template TValue
 */
class Dictionary
{
    /**
     * @var array<TValue>
     */
    private array $store = [];

    /**
     * @param TKey $key
     * @param TValue $value
     * @return void
     */
    public function set(mixed $key, mixed $value): void
    {
        $this->store[$this->nameOfKey($key)] = $value;
    }

    /**
     * @param TKey $key
     * @return TValue
     */
    public function get(mixed $key): mixed
    {
        if (!$this->containsKey($key)) {
            throw new \BadMethodCallException();
        }

        return $this->store[$this->nameOfKey($key)];
    }

    /**
     * @param TKey $key
     * @return bool
     */
    public function containsKey(mixed $key): bool
    {
        return isset($this->store[$this->nameOfKey($key)]);
    }

    /**
     * @param TKey $key
     * @return string
     */
    private function nameOfKey(mixed $key): string
    {
        if (is_string($key)) {
            return $key;
        }

        return $key->toString();
    }
}
