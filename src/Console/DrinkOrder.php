<?php

namespace GetWith\CoffeeMachine\Console;

use GetWith\CoffeeMachine\Console\Drinks\Drink;
use GetWith\CoffeeMachine\Console\Exceptions\InsufficientMoneyException;

class DrinkOrder
{
    public function __construct(private Drink $drink, float $money)
    {
        if ($money < $this->drink->getPrice()) {
            throw new InsufficientMoneyException($this->drink);
        }
    }

    public function __toString(): string
    {
        $text = "You have ordered a {$this->drink->getType()}";

        if ($this->drink->extraHot) {
            $text .= " extra hot";
        }

        if ($this->drink->sugars > 0) {
            $text .= " with {$this->drink->sugars} sugars (stick included)";
        }

        return $text;
    }
}
