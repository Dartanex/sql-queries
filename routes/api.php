<?php

use App\Http\Controllers\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/createUser', [Usuarios::class, 'create']);
Route::get('/users', [Usuarios::class, 'usuarios']);
Route::get('usersStartR', [Usuarios::class, 'usuariosNameStartWithR']);