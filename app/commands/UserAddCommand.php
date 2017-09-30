<?php

namespace App\Commands;

use App\Config;
use App\User;
use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UserAddCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:add-user')
            ->setDescription('Add new user')
            ->addOption(
                'name',
                'u',
                InputOption::VALUE_REQUIRED,
                'Insert user name'
            )
            ->addOption(
                'email',
                'e',
                InputOption::VALUE_REQUIRED,
                'Insert user email'
            )
            ->addOption(
            'password',
            'p',
            InputOption::VALUE_REQUIRED,
            'Insert user password'
            )
            ->addOption(
            'fake',
            'f',
            InputOption::VALUE_NONE,
            'You can create fake user without another parameters'
    );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $capsule = new Config();

        $faker = Factory::create();
        $user = new User();

        if ($input->getOption('fake')){
            $user->name = $faker->name();
            $user->email = $faker->email;
            $user->password = $faker->password;
        } else {
            if (!$input->getOption('name')){
                $output->writeln('<error>Empty username</error>');
                return false;
            }
            $user->name = $input->getOption('name');

            if (!$input->getOption('email')){
                $output->writeln('<error>Empty email</error>');
                return false;
            }
            $user->email = $input->getOption('email');

            if (!$input->getOption('password')){
                $output->writeln('<error>Empty password</error>');
                return false;
            }
            $user->password = $input->getOption('password');
        }

        $user->save();

        $output->writeln('User added: Name - ' . $user->name . ' | Email - ' . $user->email . ' | Password - ' . $user->password);
    }
}