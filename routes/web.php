<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/login-user', [UserController::class, 'login'])->name('user.login');
Route::get('/create-user', [UserController::class, 'create'])->name('user.cadastro');
Route::post('/store-user', [UserController::class, 'store'])->name('user-store');
Route::get('/ajuda-user', [UserController::class, 'ajuda'])->name('user.ajuda');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user-update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/sobre-layout', [UserController::class, 'sobre'])->name('layout.sobre');
Route::get('/telas-layout', [UserController::class, 'telas'])->name('layout.telas');
