<?php

use App\Http\Controllers\DevelopersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DevelopersController::class, 'obterDesenvolvedores']);
Route::get('/{id}', [DevelopersController::class, 'obterDesenvolvedorPorId']);
Route::post('/', [DevelopersController::class, 'adicionarDesenvolvedor']);
Route::put('/{id}', [DevelopersController::class, 'atualizarUmDesenvolvedor']);
Route::delete('/{id}', [DevelopersController::class, 'apagarDesenvolvedor']);