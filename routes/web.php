<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', [UsuarioController::class, 'index']);

// Rotas de usuário
Route::get('/novo-usuario', [UsuarioController::class, 'create']);
Route::post('/cadastrar-usuario', [UsuarioController::class, 'store']);
