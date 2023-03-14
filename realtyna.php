#!/usr/bin/env php
<?php
require __DIR__.'/../realtyna-API/vendor/autoload.php';

use Realtyna\MvcCore\Commands\SetupPluginCommands;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new SetupPluginCommands(__DIR__));

$application->run();