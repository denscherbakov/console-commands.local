<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Commands\UserAddCommand;
use App\Commands\UserAllCommand;
use App\Commands\UserCreateCommand;
use App\Commands\UserSearchCommand;
use App\Config;
use Symfony\Component\Console\Application;

$capsule = new Config();

$application = new Application();

$application->add(new UserAddCommand());
$application->add(new UserCreateCommand());
$application->add(new UserAllCommand());
$application->add(new UserSearchCommand());
$application->run();