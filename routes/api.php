<?php

use App\Http\Controllers\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', [ItemController::class, 'index']); // http://127.0.0.1:8000/api/items

Route::prefix('/items')->group(function () {
    Route::post('/store', [ItemController::class, 'store']); // http://127.0.0.1:8000/api/items/store
    Route::put('/{id}', [ItemController::class, 'update']); // http://127.0.0.1:8000/api/items/10
    Route::delete('/{id}', [ItemController::class, 'destroy']); // http://127.0.0.1:8000/api/items/10
});

Route::prefix('/items')->group(function () {
    Route::controller(ItemController::class)->group(function () {
        Route::post('/store', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/destroy/{id}', 'destroy');
    });
});
