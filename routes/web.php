<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categorias/{id}/registros', [CategoryController::class, 'showCmdbRecords'])->name('categories.cmdb_records');

Route::get('/', function () {
    return view('welcome');
})->name('home');