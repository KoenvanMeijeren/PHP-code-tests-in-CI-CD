<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class Product
{
    public function __construct(
        private readonly string $name,
        private readonly int $price,
        private readonly ?string $freeShippingCoupon
    ) {
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getName(): string {
        return $this->name;
    }

    public function hasFreeShippingCoupon(): bool {
        return $this->freeShippingCoupon !== null;
    }

    public function __toString(): string {
        return "name: $this->name, price: $this->price, free shipping coupon: $this->freeShippingCoupon";
    }
}
