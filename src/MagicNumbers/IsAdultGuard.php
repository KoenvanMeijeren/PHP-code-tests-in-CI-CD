<?php
declare(strict_types=1);

namespace Src\MagicNumbers;

final class IsAdultGuard {

    public function __construct(
        private readonly Person $person,
    ) {

    }

    public function isAdult(): bool {
        return $this->person->age > 18;
    }
}
