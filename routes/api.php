<?php

use App\Http\Controllers\API\ProductosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('productos', [ProductosController::class, 'all'])
        ->name('api.productos.all');
    Route::get('productos/{id}', [ProductosController::class, 'view'])
        ->name('api.productos.ver');
    Route::post('productos', [ProductosController::class, 'create'])
        ->name('api.productos.crear');
    Route::put('productos/{id}', [ProductosController::class, 'update'])
        ->name('api.productos.update');
    Route::delete('productos/{id}', [ProductosController::class, 'delete'])
        ->name('api.productos.eliminar');
});

