<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;


/*Route::get('/', function () {
    return view('welcome');
});*/


Route::resource('/categories', CategoryController::class);

Route::resource('/transactions', TransactionController::class);

Route::resource('/budgets', BudgetController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/layouts', function () {
    return view('layouts.base');
});