<?php


namespace App\Services\Pizza;


class TappingDecorator implements PizzaInterface
{
    private PizzaInterface $tempPizza;

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
