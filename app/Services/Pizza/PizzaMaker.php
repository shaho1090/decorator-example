<?php


namespace App\Services\Pizza;


use App\Services\DashesToCamelCase;


class PizzaMaker
{
    private array $request;
    private PizzaInterface $pizza;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function handle(): PizzaInterface
    {
        $this->makePizza();
        $this->addSauce();

        return $this->pizza;
    }

    private function makePizza()
    {
        $pizzaClassName = (new DashesToCamelCase())->convert($this->request['pizza']['type'],true);

        $pizzaClassName = __NAMESPACE__."\\PizzaTypes\\".$pizzaClassName;

        $this->pizza = new $pizzaClassName(new PlainPizza());
    }

    private function addSauce()
    {
        if(empty($this->request['pizza']['sauce'])) {
            return;
        }

        $sauceClassName = (new DashesToCamelCase())->convert($this->request['pizza']['sauce'],true);

        $sauceClassName = __NAMESPACE__."\\SauceTypes\\".$sauceClassName;

        $this->pizza = new $sauceClassName($this->pizza);
    }
}
