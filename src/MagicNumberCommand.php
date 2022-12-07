<?php
declare(strict_types=1);

namespace Src;

use Src\MagicNumbers\IsAdultGuard;
use Src\MagicNumbers\Person;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: self::COMMAND_NAME)]
final class MagicNumberCommand extends Command
{
    public const COMMAND_NAME = 'app:magic-number';

    protected static $defaultDescription = "Demonstrates the magic number check";

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(self::$defaultDescription);

        $person = new Person('John', 16);
        $person2 = new Person('Jane', 33);

        $output->writeln([
            '<info>Person creation</info>',
            '============',
            $person,
            $person2,
            '',
        ]);

        $personIsAdult = (new IsAdultGuard($person))->isAdult();
        $person2IsAdult = (new IsAdultGuard($person2))->isAdult();
        $person2IsAboveAge = (new IsAdultGuard($person2))->isAboveAge(3);

        $output->writeln([
            '<info>Age validation</info>',
            '============',
            $personIsAdult ? "{$person->name} is volwassen" : "{$person->name} is niet volwassen",
            $person2IsAdult ? "{$person2->name} is volwassen" : "{$person2->name} is niet volwassen",
            $person2IsAboveAge ? "{$person2->name} is ouder dan 3" : "{$person2->name} is niet ouder dan 3",
        ]);

        return Command::SUCCESS;
    }
}
