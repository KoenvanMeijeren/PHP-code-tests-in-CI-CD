<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Product
{
    public function __construct(
        private readonly int $price,
        private readonly ?string $freeShippingCoupon
    ) {
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function hasFreeShippingCoupon(): bool {
        return $this->freeShippingCoupon !== null;
    }
}
