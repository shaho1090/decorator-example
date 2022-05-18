<?php


namespace App\Services\Pizza;


abstract class AbstractTappingDecorator implements PizzaInterface
{
    public PizzaInterface $tempPizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->tempPizza = $pizza;
    }

    public function description(): string
    {
        return $this->tempPizza->description();
    }

    public function cost(): float
    {
        return $this->tempPizza->cost();
    }
}
