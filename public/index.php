<?php
declare(strict_types=1);

if (php_sapi_name() !== 'cli') {
    throw new RuntimeException('Cannot execute this script on the browser. Only running from the CLI is allowed.');
}

require_once __DIR__ . '/../vendor/autoload.php';

use Src\MagicNumbers\MagicNumberProgramCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$command = new MagicNumberProgramCommand();
$application->add($command);
$application->setDefaultCommand($command->getName());
$application->run();

