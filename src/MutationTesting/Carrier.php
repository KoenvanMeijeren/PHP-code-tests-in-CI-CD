<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Carrier
{
    public function __construct(
        public readonly string $name,
        public readonly bool $acceptFreeShipping
    ) {
    }

    public function allowsFreeShipping(): bool {
        return $this->acceptFreeShipping;
    }

    public function __toString(): string {

        $freeShipping = $this->allowsFreeShipping() ? "yes" : "no";

        return "carrier: $this->name, free shipping: $freeShipping";
    }
}
