<?php

namespace Tests\Feature;

use App\Services\Pizza\PizzaTypes\Mozzarella;
use App\Services\Pizza\PlainPizza;
use App\Services\Pizza\SauceTypes\Tomato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MozzarellaTest extends TestCase
{
    public function test_a_user_can_order_a_mozzarella_pizza_without_any_sauce()
    {
        $request = [
            'pizza' => [
                'type' => 'mozzarella',
                'quantity' => 1,
                'sauce' => ''
            ]
        ];

        $response = $this->postJson(route('pizza.store'), $request);

        $response->assertJsonFragment([
            "cost" => (new Mozzarella(new PlainPizza()))->cost(),
            "description" => (new Mozzarella(new PlainPizza()))->description()
        ]);
    }

    public function test_a_user_can_order_a_mozzarella_pizza_with_tomato_sauce()
    {
        $request = [
            'pizza' => [
                'type' => 'mozzarella',
                'quantity' => 1,
                'sauce' => 'tomato'
            ]
        ];

        $response = $this->postJson(route('pizza.store'), $request);

        $response->assertJsonFragment([
            "cost" => (new Tomato((new Mozzarella(new PlainPizza()))))->cost(),
            "description" => (new Tomato((new Mozzarella(new PlainPizza()))))->description(),
        ]);
    }
}
