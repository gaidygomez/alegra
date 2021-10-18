<?php

use App\Http\Controllers\{HistoryController, MealController, PurchaseController, StorageController};
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

Route::get('food', [MealController::class, 'food']);
Route::get('available', [StorageController::class, 'available']);
Route::get('history-purchase', [PurchaseController::class, 'historyPurchase']);
Route::get('history', [HistoryController::class, 'history']);
Route::get('meals', [MealController::class, 'meals']);
Route::get('in-kitchen', [MealController::class, 'inKitchen']);