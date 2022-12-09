<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukController;

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

Route::post('/produk', [ProdukController::class, 'create']);

Route::get('/produk', [ProdukController::class, 'list']);

Route::get('/produk/{id}', [ProdukController::class, 'show']);

Route::put('/produk/{id}', [ProdukController::class, 'update']);

Route::delete('/produk/{id}', [ProdukController::class, 'delete']);