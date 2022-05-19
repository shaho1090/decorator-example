<?php

namespace App\Http\Controllers;

use App\Http\Resources\PizzaResource;
use App\Services\notification\Notifier;
use App\Services\Pizza\PizzaMaker;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $pizza = (new PizzaMaker($request->toArray()))->handle();

        $notifications = [];

        if(isset($request['broadcasting-channels'])){
           $notifications = (new Notifier($request['broadcasting-channels']))->handle();
        }

        return response()->json([
           'data' =>  [
               'pizza' => new PizzaResource($pizza),
               'notification' => $notifications
           ]
        ]);
    }
}
