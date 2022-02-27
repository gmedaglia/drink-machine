<?php

namespace GetWith\CoffeeMachine\Console\Drinks;

use RuntimeException;

abstract class Drink
{

    public function __construct(public int $sugars, public bool $extraHot)
    {
        if ($this->sugars < 0 || $this->sugars > 2) {
            throw new RuntimeException("The number of sugars should be between 0 and 2.");
        }
    }

    abstract public function getPrice(): float;
    abstract public function getType(): string;

}
