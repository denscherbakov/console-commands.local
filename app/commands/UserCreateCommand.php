<?php

namespace App\Commands;

use App\Config;
use App\User;
use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UserCreateCommand extends Command
{
    protected $countUsers = 10;

    protected function configure()
    {
        $this->setName('app:create-users')
            ->setDescription('Create users by faker')
            ->addOption(
                'count',
                'c',
                InputOption::VALUE_REQUIRED,
                'Count users',
                $this->countUsers
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $capsule = new Config();

        $faker = Factory::create();

        for ($i = 0; $i < (int)$input->getOption('count'); $i++){
            $user = new User();

            $user->email = $faker->email;
            $user->name = $faker->name();
            $user->password = $faker->password;

            $user->save();
        }
    }
}