<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Product
{
    public function __construct(
        readonly private int $price,
        readonly private ?string $freeShippingCoupon
    ) {
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function hasFreeShippingCoupon(): bool {
        return $this->freeShippingCoupon !== null;
    }
}
