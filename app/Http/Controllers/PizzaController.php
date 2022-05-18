<?php

namespace App\Http\Controllers;

use App\Http\Resources\PizzaResource;
use App\Services\Pizza\PizzaMaker;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $pizza = (new PizzaMaker($request->toArray()))->handle();

        return response()->json([
           'data' =>  new PizzaResource($pizza)
        ]);
    }
}
