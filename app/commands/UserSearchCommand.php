<?php

namespace App\Commands;

use App\Config;
use App\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UserSearchCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:search-user')
            ->setDescription('Search user by name')
            ->addOption(
                'name',
                'u',
                InputOption::VALUE_REQUIRED,
                'Username'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $capsule = new Config();

        if ($input->getOption('name')){
            $name = $input->getOption('name');
            $search = User::where('name', 'like', "%$name%")->get()[0];

            if (!empty($search->name)){
                $output->writeln($search->name . ' | ' . $search->email . ' | ' . $search->password);
            } else {
                $output->writeln('<error>User not found</error>');
            }

        } else {
            $output->writeln('<error>Empty parameters</error>');
        }
    }
}