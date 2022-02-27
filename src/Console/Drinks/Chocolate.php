<?php

namespace GetWith\CoffeeMachine\Console\Drinks;

class Chocolate extends Drink
{

    public function getPrice(): float
    {
        return 0.6;
    }

    public function getType(): string
    {
        return 'chocolate';
    }

}
