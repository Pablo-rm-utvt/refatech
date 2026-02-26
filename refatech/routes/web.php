<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});     
Route::resource('productos', ProductoController::class);
Route::resource('compras', CompraController::class);
Route::resource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);
Route::resource('usuarios', UsuarioController::class);
