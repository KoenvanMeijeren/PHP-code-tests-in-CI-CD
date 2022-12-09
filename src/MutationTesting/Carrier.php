<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Carrier
{
    public function __construct(
        private readonly bool $acceptFreeShipping
    ) {
    }

    public function allowsFreeShipping(): bool {
        return $this->acceptFreeShipping;
    }
}
