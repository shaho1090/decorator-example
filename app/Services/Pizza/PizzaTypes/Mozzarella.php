<?php


namespace App\Services\Pizza\PizzaTypes;


use App\Services\Pizza\PizzaIngredient;
use App\Services\Pizza\PizzaInterface;

class Mozzarella extends PizzaIngredient
{
    public function __construct(PizzaInterface $pizza)
    {
        parent::__construct($pizza);

        $this->setCost(3.00);
        $this->setDescription(' plus mozzarella');
    }
}
