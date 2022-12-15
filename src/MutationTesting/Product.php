<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Product
{
    public function __construct(
        public readonly string $name,
        public readonly int $price,
        public readonly ?string $freeShippingCoupon
    ) {
    }

    public function hasFreeShippingCoupon(): bool {
        return $this->freeShippingCoupon !== null;
    }

    public function __toString(): string {
        return "name: $this->name, price: $this->price, free shipping coupon: $this->freeShippingCoupon";
    }
}
