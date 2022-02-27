<?php

namespace GetWith\CoffeeMachine\Console\Exceptions;

use RuntimeException;

class InvalidDrinkException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("The drink type should be tea, coffee or chocolate.");
    }
}
