<?php

use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */


 //auth
Route::get('/user', [UserController::class, 'user'])->middleware('auth:sanctum');
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

// instrument & watchlist
Route::get('/instruments/index/', [InstrumentController::class, 'index'])->middleware('auth:sanctum');
Route::get('/watchlist/index/', [WatchlistController::class, 'index'])->middleware('auth:sanctum');
Route::post('/watchlist/store/', [WatchlistController::class, 'store'])->middleware('auth:sanctum');
Route::post('/watchlist/removeItem/', [WatchlistController::class, 'removeItem'])->middleware('auth:sanctum');

//customer orders
Route::get('/customer_orders/index/', [CustomerOrderController::class, 'index'])->middleware('auth:sanctum');
Route::post('/customer_orders/store/', [CustomerOrderController::class, 'store'])->middleware('auth:sanctum');
