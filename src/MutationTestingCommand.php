<?php
declare(strict_types=1);

namespace Src;

use Src\MutationTesting\Carrier;
use Src\MutationTesting\Product;
use Src\MutationTesting\ShippingCalculator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: self::COMMAND_NAME)]
final class MutationTestingCommand extends Command
{
    public const COMMAND_NAME = 'app:mutation-testing';

    protected static $defaultDescription = "Demonstrates mutation testing";

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("");
        $output->writeln(self::$defaultDescription);

        $product1 = new Product("product1", 10, null);
        $product2 = new Product("product2", 36, "coupon");
        $product3 = new Product("product3",12, "coupon");

        $output->writeln([
            '<info>Products</info>',
            '============',
            $product1,
            $product2,
            $product3,
            '',
        ]);

        $carrier1 = new Carrier("DHL", false);
        $carrier2 = new Carrier("PostNL", true);

        $output->writeln([
            '<info>Carriers</info>',
            '============',
            $carrier1,
            $carrier2,
            '',
        ]);

        $shippingCalculator1 = new ShippingCalculator($carrier1);
        $shippingCalculator2 = new ShippingCalculator($carrier2);

        $output->writeln([
            '<info>Free shipping</info>',
            '============',
            "$product3 | $carrier1 | has " . ($shippingCalculator1->isShippingFree($product3) ? "" : "no") . " free shipping.",
            "$product1 | $carrier1 | has " . ($shippingCalculator1->isShippingFree($product1) ? "" : "no") . " free shipping.",
            "$product2 | $carrier1 | has " . ($shippingCalculator1->isShippingFree($product2) ? "" : "no") . " free shipping.",
            "$product1 | $carrier2 | has " . ($shippingCalculator2->isShippingFree($product1) ? "" : "no") . " free shipping.",
            "$product2 | $carrier2 | has " . ($shippingCalculator2->isShippingFree($product2) ? "" : "no") . " free shipping.",
            "$product3 | $carrier2 | has " . ($shippingCalculator2->isShippingFree($product3) ? "" : "no") . " free shipping.",
        ]);

        return Command::SUCCESS;
    }
}
