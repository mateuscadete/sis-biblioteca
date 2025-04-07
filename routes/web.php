<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/login-user', [UserController::class, 'login'])->name('user.login');
Route::get('/create-user', [UserController::class, 'create'])->name('user.cadastro');
Route::post('/store-user', [UserController::class, 'store'])->name('user-store');
Route::post('/login', [UserController::class, 'logar'])->name('login-user');
Route::get('/ajuda-user', [UserController::class, 'ajuda'])->name('user.ajuda');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user-update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/sobre-layout', [UserController::class, 'sobre'])->name('layout.sobre');
Route::get('/telas-layout', [UserController::class, 'telas'])->name('layout.telas');

// Rotas para o formulário de contato
Route::post('/contato', [ContatoController::class, 'submit'])->name('contato.submit');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
