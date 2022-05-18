<?php


use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

Route::post('/pizza',[PizzaController::class,'store'])->name('pizza.store');
