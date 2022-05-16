<?php


namespace App\Services\Pizza;


interface PizzaInterface
{
    public function description(): string;

    public function cost(): float;
}
