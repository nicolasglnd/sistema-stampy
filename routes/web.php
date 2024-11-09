<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/inventario', App\Http\Controllers\InventarioController::class);
