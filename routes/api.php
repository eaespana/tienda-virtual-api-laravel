<?php

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

use App\Http\Controllers\Api\V1\ArticuloController as ArticuloV1;
use App\Http\Controllers\Api\V1\PedidoController as PedidoV1;
use App\Http\Controllers\Api\V1\PedidoArticuloController as PedidoArticuloV1;
use App\Http\Controllers\Api\LoginController as LoginV1;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('v1/articulo',ArticuloV1::class)
    ->only(['show'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/pedido',PedidoV1::class)
    ->only(['show'])
    ->middleware('auth:sanctum');

Route::post('login', [LoginV1::class,'login']);
