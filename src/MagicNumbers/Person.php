<?php
declare(strict_types=1);

namespace Src\MagicNumbers;

final class Person
{
    public function __construct(
        public readonly string $name,
        public readonly int $age = 0
    ) {}

    public function __toString(): string
    {
        return "{$this->name} is ({$this->age})";
    }
}
