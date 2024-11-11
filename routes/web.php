<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InventarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/inventario', InventarioController::class);
Route::resource('/empleados', EmpleadoController::class);
//Route::delete('/empleados/{id}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');

