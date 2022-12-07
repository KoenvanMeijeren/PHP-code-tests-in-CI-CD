<?php
declare(strict_types=1);

namespace Src\MagicNumbers;

final class IsAdultGuard {

    private int $youngAdult = 24;

    public function __construct(
        private readonly Person $person,
    ) {}

    public function isAdult(): bool {
        return $this->person->age > 18;
    }

    public function isAboveAge(int $age = -1): bool {
        return $this->person->age > $age;
    }

    public function getSeniorAge(): int {
        return 60;
    }
}
