<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', [UsuarioController::class, 'index']);

// Rotas de usuário

Route::prefix('usuario')->group(function () {
    Route::get('/novo-usuario', [UsuarioController::class, 'create']);
    Route::post('/cadastrar-usuario', [UsuarioController::class, 'store']);
    Route::get('/entrar', [UsuarioController::class, 'entrar']);
    Route::post('/login', [UsuarioController::class, 'login']);
});
