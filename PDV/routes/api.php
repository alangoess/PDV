<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\CategoriaController;

Route::apiResource('user', UserController::class);
Route::apiResource('produto', ProdutoController::class);
Route::apiResource('categoria', CategoriaController::class);
Route::apiResource('estoque', EstoqueController::class);

