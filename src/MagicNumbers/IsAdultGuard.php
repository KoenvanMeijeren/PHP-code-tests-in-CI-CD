<?php
declare(strict_types=1);

namespace Src\MagicNumbers;

final class IsAdultGuard {

    private const YOUNG_ADULT_AGE = 24;
    private const ADULT_AGE = 18;
    private const SENIOR_AGE = 60;
    private const UNDEFINED_AGE = -1;

    public function __construct(
        private readonly Person $person,
    ) {}

    public function isAdult(): bool {
        return $this->person->age > self::ADULT_AGE;
    }

    public function isAboveAge(int $age = self::UNDEFINED_AGE): bool {
        return $this->person->age > $age;
    }

    public function getSeniorAge(): int {
        return self::SENIOR_AGE;
    }
}
