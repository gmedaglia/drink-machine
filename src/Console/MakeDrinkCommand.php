<?php

namespace GetWith\CoffeeMachine\Console;

use GetWith\CoffeeMachine\Console\Drinks\Drink;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use GetWith\CoffeeMachine\Console\Drinks\DrinkFactory;
use Throwable;

class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    public function __construct()
    {
        parent::__construct(MakeDrinkCommand::$defaultName);
    }

    protected function configure(): void
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $drinkType = strtolower($input->getArgument('drink-type'));
            $sugars = $input->getArgument('sugars');
            $extraHot = $input->getOption('extra-hot');

            $drink = DrinkFactory::create($drinkType, $sugars, $extraHot);

            $money = $input->getArgument('money');

            $order = new DrinkOrder($drink, $money);

            $output->writeln($order->toString());

            $this->updateData($drink);

            return 1;

        } catch (Throwable $e) {

            $output->writeln($e->getMessage());
            return 0;
        }
    }

    protected function updateData(Drink $drink)
    {
        $data = json_decode(file_get_contents('data.json'), true);
        $data[$drink->getType()] = $data[$drink->getType()] + $drink->getPrice();
        file_put_contents('data.json', json_encode($data));
    }
}
