<?php

namespace Tests\Unit;

use App\Services\Pizza\PizzaInterface;
use App\Services\Pizza\PlainPizza;
use PHPUnit\Framework\TestCase;

class PlainPizzaTest extends TestCase
{

    public function test_it_has_get_description_method_and_return_string()
    {
        $plainPizza = new PlainPizza();

        $this->assertIsString(call_user_func_array([$plainPizza,'description'],[]));
    }

    public function test_it_has_description_method_and_return_string()
    {
        $plainPizza = new PlainPizza();

        $this->assertIsScalar(call_user_func_array([$plainPizza,'cost'],[]));
    }
}
