<?php
declare(strict_types=1);

namespace Src;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: self::COMMAND_NAME)]
final class ExecuteAllCommand extends Command {

    public const COMMAND_NAME = 'app:all';

    protected function execute(InputInterface $input, OutputInterface $output): int {
        $application = $this->getApplication();

        $command = $application->find(MagicNumberCommand::COMMAND_NAME);
        $command->run(new ArrayInput([]), $output);



        $command = $application->find(MutationTestingCommand::COMMAND_NAME);
        $command->run(new ArrayInput([]), $output);

        $command = $application->find(MessDetectorCommand::COMMAND_NAME);
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }

}
