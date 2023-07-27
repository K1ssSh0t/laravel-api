<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('clientes', ClienteController::class);

Route::apiResource('videoGames', VideoGameController::class);

Route::apiResource('users', UserController::class);

Route::apiResource('categories', CategoriesController::class);

Route::get('clientes/{email}/{password}', [ClienteController::class, 'getCliente']);
