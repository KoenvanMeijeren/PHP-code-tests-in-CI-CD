<?php
declare(strict_types=1);

namespace Src;

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
        $output->writeln(self::$defaultDescription);

        return Command::SUCCESS;
    }
}
