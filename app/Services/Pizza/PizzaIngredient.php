<?php


namespace App\Services\Pizza;


class PizzaIngredient extends AbstractTappingDecorator
{
    private float $cost = 0;
    private string $description = '';

    public function description(): string
    {
        return parent::description() . $this->description;
    }

    public function cost(): float
    {
        return parent::cost() + $this->cost;
    }

    public function setCost(float $cost): static
    {
        $this->cost = $cost;

        return $this;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

}
