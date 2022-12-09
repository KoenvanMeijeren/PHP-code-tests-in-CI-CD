<?php
declare(strict_types=1);

if (php_sapi_name() !== 'cli') {
    throw new RuntimeException('Cannot execute this script on the browser. Only running from the CLI is allowed.');
}

require_once __DIR__ . '/../vendor/autoload.php';

use Src\ExecuteAllCommand;
use Src\MagicNumberCommand;
use Src\MutationTestingCommand;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new MagicNumberCommand());

$application->add(new MutationTestingCommand());

$defaultCommand = new ExecuteAllCommand();
$application->add($defaultCommand);
$application->setDefaultCommand($defaultCommand->getName());

$application->run();
