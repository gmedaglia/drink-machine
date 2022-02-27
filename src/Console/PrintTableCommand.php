<?php

namespace GetWith\CoffeeMachine\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PrintTableCommand extends Command
{
    protected static $defaultName = 'app:print-table';

    public function __construct()
    {
        parent::__construct(PrintTableCommand::$defaultName);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $data = json_decode(file_get_contents('data.json'), true);

        $table = new Table($output);
        $table->setHeaders(['Drink', 'Money']);

        foreach ($data as $drink => $money) {
            $table->addRow([$drink, $money]);
        }

        $table->render();

        return 1;
    }

}
