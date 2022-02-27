<?php

namespace GetWith\CoffeeMachine\Console\Exceptions;

use GetWith\CoffeeMachine\Console\Drinks\Drink;
use RuntimeException;

class InsufficientMoneyException extends RuntimeException
{
    public function __construct(Drink $drink)
    {
        parent::__construct("The {$drink->getType()} costs {$drink->getPrice()}.");
    }
}
