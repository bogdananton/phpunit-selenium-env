<?php
namespace SeleniumSetup\Command\System;

use SeleniumSetup\EnvironmentInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetEnvSystemCommand extends Command
{
    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('setEnvVar')
            ->setDescription('')
            ->addArgument('name', InputArgument::REQUIRED, 'The var name.')
            ->addArgument('value', InputArgument::OPTIONAL, 'The var value.');
    }
    /**
     * Execute the command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('value') != '') {
            putenv($input->getOption('name'). '=' .$input->getOption('value'));
        } else {
            putenv($input->getOption('name'));
        }
    }

    /**
     * Find the correct executable to run depending on the OS.
     *
     * @param EnvironmentInterface $env
     * @return string
     */
    protected function getSeparator(EnvironmentInterface $env)
    {
        if ($env->getOsName() == $env::OS_WINDOWS) {
            $separator = ';';
        } else if ($env->getOsName() == $env::OS_LINUX) {
            $separator = ':';
        } else {
            $separator = ':';
        }

        return $separator;
    }
}