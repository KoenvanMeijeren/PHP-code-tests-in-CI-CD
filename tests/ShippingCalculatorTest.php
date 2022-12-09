<?php
declare(strict_types=1);

namespace Tests;

use \PHPUnit\Framework\TestCase;
use Src\MutationTesting\Carrier;
use Src\MutationTesting\Product;
use Src\MutationTesting\ShippingCalculator;

/**
 * @covers \Src\MutationTesting\ShippingCalculator
 */
class ShippingCalculatorTest extends TestCase
{
    public function test_free_shipping_should_not_be_applied_when_price_is_to_low(): void {

        $product = new Product(10, null);
        $carrier = new Carrier(true);
        $calc = new ShippingCalculator($carrier);
        $isShippingFree = $calc->isShippingFree($product);

        $this->assertFalse($isShippingFree);
    }
}
