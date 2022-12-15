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

        $product = new Product("product1", 10, null);
        $carrier = new Carrier("PostNl", true);
        $calc = new ShippingCalculator($carrier);
        $isShippingFree = $calc->isShippingFree($product);

        $this->assertFalse($isShippingFree);
    }

    public function test_free_shipping_should_not_be_applied_when_price_is_to_low2(): void {

        $product = new Product("product1", 40, "coupon");
        $carrier = new Carrier("PostNl", true);
        $calc = new ShippingCalculator($carrier);
        $isShippingFree = $calc->isShippingFree($product);

        $this->assertTrue($isShippingFree);
    }

    public function test_free_shipping_should_not_be_applied_when_price_is_to_low3(): void {

        $product = new Product("product1", 35, "coupon");
        $carrier = new Carrier("PostNl", true);
        $calc = new ShippingCalculator($carrier);
        $isShippingFree = $calc->isShippingFree($product);

        $this->assertFalse($isShippingFree);
    }
}
