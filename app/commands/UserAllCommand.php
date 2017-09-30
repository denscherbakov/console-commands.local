<?php

namespace App\Commands;

use App\Config;
use App\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserAllCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:all-users')
            ->setDescription('Show all users');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $capsule = new Config();

        $output->writeln(User::all());

        $users = User::all();

        $output->writeln('<info>Name | Email | Password</info>');

        foreach ($users as $user){
            $output->writeln($user->name . ' | ' . $user->email . ' | ' . $user->password);
        }
    }
}