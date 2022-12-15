<?php
declare(strict_types=1);

namespace Src\MutationTesting;

final class ShippingCalculator
{
    public function __construct(
        private readonly Carrier $carrier
    ) {
    }

    public function isShippingFree(Product $product): bool {

        if($product->price <= 35) {
            return false;
        }

        if(!$product->hasFreeShippingCoupon()) {
            return false;
        }

        return $this->carrier->allowsFreeShipping();
    }
}
