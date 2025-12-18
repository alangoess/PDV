<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Models\Estoque;
use Illuminate\Support\Facades\Route;

Route::resource('user', UserController::class);
Route::resource('produto', ProdutoController::class);
Route::resource('estoque', EstoqueController::class);
Route::resource('categoria', CategoriaController::class);
