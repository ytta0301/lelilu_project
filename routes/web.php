<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashbord', function () {
    return view('dashbord.dashbord'); // Folder.NamaFile
});

