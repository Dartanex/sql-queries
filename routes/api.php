<?php

use App\Http\Controllers\Pedidos;
use App\Http\Controllers\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/createUser', [Usuarios::class, 'create']);
Route::post('/createOrder', [Pedidos::class, 'createOrder']);
Route::get('/users', [Usuarios::class, 'usuarios']);
Route::get('/orders', [Pedidos::class, 'orders']);

Route::get('/ordersByIdTwo', [Pedidos::class, 'getAllOrdersByIdTwo']);
Route::get('/ordersWithUserInfo', [Pedidos::class, 'getAllOrdersWithUserNameAndEmail']);
Route::get('/ordersTotalPriceRange',[Pedidos::class, 'getOrdersbyTotalPriceRange']);
Route::get('usersStartR', [Usuarios::class, 'usuariosNameStartWithR']);
Route::get('/totalOrdersForUserIDFive',[Pedidos::class, 'totalOrdersForUserIDFive']);
Route::get('/ordersByTotalPriceDescSort',[Pedidos::class, 'ordersByTotalPriceDescSort']);
Route::get('/getTotalForAllOrders', [Pedidos::class, 'getTotalForAllOrders']);
Route::get('/cheapestOrderWithUserName', [Pedidos::class, 'cheapestOrderWithUserName']);
Route::get('/getOrdersGroupByUsername', [Pedidos::class, 'getOrdersGroupByUsername']);