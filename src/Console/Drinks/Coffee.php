<?php

namespace GetWith\CoffeeMachine\Console\Drinks;

class Coffee extends Drink
{

    public function getPrice(): float
    {
        return 0.5;
    }

    public function getType(): string
    {
        return 'coffee';
    }

}
