<?php

namespace GetWith\CoffeeMachine\Console\Drinks;

use GetWith\CoffeeMachine\Console\Exceptions\InvalidDrinkException;

class DrinkFactory
{

    public static function create(string $drink, int $sugars, bool $extraHot): Drink
    {
        return match ($drink) {
            'coffee' => new Coffee($sugars, $extraHot),
            'tea' => new Tea($sugars, $extraHot),
            'chocolate' => new Chocolate($sugars, $extraHot),
            default => throw new InvalidDrinkException
        };
    }

}
