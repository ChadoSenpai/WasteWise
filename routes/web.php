<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangaysController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [Controllers\DashboardController::class, 'index']);
Route::post('/logout', [Controllers\DashboardController::class, 'index']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');




//Session
Route::get('/login', [Controllers\AuthController::class, 'index'])->name('login');
Route::post('/auth/user', [Controllers\AuthController::class, 'store']);
Route::get('/logout', [Controllers\AuthController::class, 'destroy'])->name('logout');

Route::resource('barangays', controller: BarangaysController::class);

