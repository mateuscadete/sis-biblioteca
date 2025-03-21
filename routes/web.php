<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/login-user', [UserController::class, 'login'])->name('user.login');
Route::get('/create-user', [UserController::class, 'create'])->name('user.cadstro');
Route::post('/store-user', [UserController::class, 'store'])->name('user-store');
Route::get('/teste-user', [UserController::class, 'teste'])->name('user.teste');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user-update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
