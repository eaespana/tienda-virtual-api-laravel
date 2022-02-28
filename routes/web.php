<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PedidoController as Pedidos;
use App\Http\Controllers\ArticuloController as Articulos;
use App\Http\Controllers\PageController as Page;
use App\Http\Controllers\PedidoArticuloController as PedidoArticulo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('dashboard', [Page::class, 'dashboard'])
        ->Middleware(['auth:sanctum', 'verified'])
        ->name('dashboard');


Route::resource('pedidos', Pedidos::class)
        ->Middleware(['auth:sanctum', 'verified']);

Route::resource('articulos', Articulos::class)
        ->Middleware(['auth:sanctum', 'verified']);

Route::get('pedidosarticulos', [PedidoArticulo::class, 'index'])->name('pedidosarticulos');

Route::post('pedidosarticulostore', [PedidoArticulo::class, 'store'])->name('pedidosarticulostore');
