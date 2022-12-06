<?php
declare(strict_types=1);

namespace Src\MagicNumbers;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:magic-number')]
final class MagicNumberProgramCommand extends Command
{
    protected static $defaultDescription = "Demonstrates the magic number check";

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $person = new Person('Jacko', 16);
        $person2 = new Person('Harmen', 33);

        $output->writeln([
            '<info>Person creation</info>',
            '============',
            $person,
            $person2
        ]);

        $personIsAdult = (new IsAdultGuard($person))->isAdult();
        $person2IsAdult = (new IsAdultGuard($person2))->isAdult();

        $output->writeln([
            '<info>Age validation</info>',
            '============',
            $personIsAdult ? "{$person->name} is volwassen" : "{$person->name} is niet volwassen",
            $person2IsAdult ? "{$person2->name} is volwassen" : "{$person2->name} is niet volwassen",
        ]);

        return Command::SUCCESS;
    }
}
