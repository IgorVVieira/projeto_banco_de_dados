<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VooController;

Route::get('/', [VooController::class, 'index']);

// Rotas de usuário
Route::prefix('usuario')->group(function () {
    Route::get('/novo-usuario', [UsuarioController::class, 'create']);
    Route::post('/cadastrar-usuario', [UsuarioController::class, 'store']);
    Route::get('/editar/{id}', [UsuarioController::class, 'edit']);
    Route::put('/update/{id}', [UsuarioController::class, 'update']);
    Route::get('/entrar', [UsuarioController::class, 'entrar']);
    Route::post('/login', [UsuarioController::class, 'login']);
});
