<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
// Ruta para la página de categorías
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');

// Ruta para la página de inicio, asignándole el nombre 'home'
Route::get('/', function () {
    return view('welcome');
})->name('home');