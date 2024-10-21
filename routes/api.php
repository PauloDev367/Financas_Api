<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\V1\BalanceController;
use App\Http\Controllers\V1\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(["prefix" => "balances", "middleware" => "auth.jwt"], function () {
    Route::get("", [BalanceController::class, 'get']);
    Route::post("income", [BalanceController::class, 'addIncome']);
    Route::post("expense", [BalanceController::class, 'addExpense']);
});

Route::group(["prefix" => "categories", "middleware" => "auth.jwt"], function () {
    Route::get("income", [CategoryController::class, 'getIncome']);
    Route::get("expense", [CategoryController::class, 'getExpense']);
    Route::post("income", [CategoryController::class, 'createIncomeCategory']);
    Route::post("expense", [CategoryController::class, 'createExpenseCategory']);
    Route::delete("{id}", [CategoryController::class, 'delete']);
});
