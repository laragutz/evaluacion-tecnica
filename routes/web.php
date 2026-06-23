<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return redirect()->route('productos.index');
});
Route::get(
    '/productos-exportar',
    [ProductoController::class, 'exportar']
)->name('productos.exportar');

Route::resource('productos', ProductoController::class);
