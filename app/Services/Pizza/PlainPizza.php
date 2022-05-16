<?php


namespace App\Services\Pizza;


class PlainPizza implements PizzaInterface
{

    public function description(): string
    {
        return 'Thin dough';
    }

    public function cost(): float
    {
        return 4.00;
    }
}
