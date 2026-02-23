<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.index');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('login.dashboard');
    })->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('login.logout');
});
