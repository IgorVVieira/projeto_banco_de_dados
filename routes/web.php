<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VooController;
use App\Http\Controllers\EmpresaAereaController;
use App\Http\Controllers\CartaoContoller;

Route::get('/', [UsuarioController::class, 'entrar']);

Route::get('/voos', [VooController::class, 'index']);

Route::prefix('usuario')->group(function () {
    Route::get('/novo', [UsuarioController::class, 'create']);
    Route::post('/cadastrar', [UsuarioController::class, 'store']);
    Route::get('/editar/{id}', [UsuarioController::class, 'edit']);
    Route::put('/update/{id}', [UsuarioController::class, 'update']);
    Route::post('/login', [UsuarioController::class, 'login']);
    Route::get('/sair', [UsuarioController::class, 'logOut']);
});

Route::prefix('empresa')->group(function () {
    Route::get('/nova', [EmpresaAereaController::class, 'create']);
    Route::post('/cadastrar', [EmpresaAereaController::class, 'store']);
    Route::get('/entrar', [EmpresaAereaController::class, 'entrar']);
    Route::post('/login', [EmpresaAereaController::class, 'login']);
});

Route::prefix('cartao')->group(function () {
    Route::get('/novo', [CartaoContoller::class, 'create']);
    Route::post('/cadastrar', [CartaoContoller::class, 'store']);
    Route::get('/todos/{id}', [CartaoContoller::class, 'show']);
    Route::post('/deletar', [CartaoContoller::class, 'destroy']);
});
