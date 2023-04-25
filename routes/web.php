<?php

use App\Http\Controllers\Admins;
use App\Http\Controllers\authController;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

Route::get('/',[authController::class, 'index'])->name('login');
Route::post('/logear',[authController::class, 'logeo'])->name('logeo');
Route::get('/logout',[authController::class, 'logout'])->name('logout');

Route::get('/usuarioNuevo',[authController::class, 'agregarUsuario']);

Route::get('/administrador',[Admins::class, 'index'])->name('admin_index');

Route::get('/usuario',[Users::class, 'index'])->name('user_index');