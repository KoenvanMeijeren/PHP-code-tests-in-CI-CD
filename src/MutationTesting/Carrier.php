<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Carrier
{
    public function __construct(
        readonly private bool $acceptFreeShipping
    ) {
    }

    public function allowsFreeShipping(): bool {
        return $this->acceptFreeShipping;
    }
}
