<?php
declare(strict_types=1);

namespace Src;

use Src\MessDetector\BattleSimulator;
use Src\MessDetector\Pokemon;
use Src\MessDetector\Type;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: self::COMMAND_NAME)]
final class MessDetectorCommand extends Command
{
    public const COMMAND_NAME = 'app:mess-detection';

    protected static $defaultDescription = "Demonstrates mess detection";

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(self::$defaultDescription);

        $pokemon1 = new Pokemon("Charmander", Type::Fire, 50, 12, 9);
        $pokemon2 = new Pokemon("Blobvis", Type::Water, 200, 6, 5);

        $output->writeln([
            '<info>Pokemon creation</info>',
            $pokemon1,
            $pokemon2,
            ''
        ]);

        $simulator = new BattleSimulator($pokemon1, $pokemon2);

        $winningPokemon = $simulator->simulateBattle();

        $output->writeln([
            '<info>The winning pokemon</info>',
            $winningPokemon,
            ''
        ]);

        return Command::SUCCESS;
    }
}
