<?php


namespace App\Services\Pizza\SauceTypes;


use App\Services\Pizza\PizzaIngredient;
use App\Services\Pizza\PizzaInterface;

class Tomato extends PizzaIngredient
{
    public function __construct(PizzaInterface $pizza)
    {
        parent::__construct($pizza);

        $this->setCost(0.40);
        $this->setDescription(' plus tomato sauce');
    }
}
