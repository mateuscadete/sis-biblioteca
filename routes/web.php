<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

//Rota para a pagina home
Route::get('/', [UserController::class, 'index'])->name('user.index');

//Rotas para a pagina de login
Route::get('/login-user', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'logar'])->name('login-user');

//Rota para a página de cadastro
Route::get('/create-user', [UserController::class, 'create'])->name('user.cadastro');
Route::post('/store-user', [UserController::class, 'store'])->name('user-store');

//Rota pra pagina ajuda
Route::get('/ajuda-user', [UserController::class, 'ajuda'])->name('user.ajuda');


//Rota para pagina sobre
Route::get('/sobre-layout', [UserController::class, 'sobre'])->name('layout.sobre');


// Rotas para o formulário de contato
Route::post('/contato', [ContatoController::class, 'submit'])->name('contato.submit');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');


//Rota Para pagina do livro
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/cadastro-livro', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::post('/livro', [LivroController::class, 'submit'])->name('livro.submit');
