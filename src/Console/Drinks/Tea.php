<?php

namespace GetWith\CoffeeMachine\Console\Drinks;

class Tea extends Drink
{

    public function getPrice(): float
    {
        return 0.4;
    }

    public function getType(): string
    {
        return 'tea';
    }

}
