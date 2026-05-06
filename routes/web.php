<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\HistoryController;

// Guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua halaman bebas diakses
Route::get('/', fn() => view('welcome'));
Route::get('/dashboard', fn() => view('dashboard.dashboard'));
Route::get('/order', fn() => view('order.order'));
Route::get('/payment', fn() => view('payment.payment'));
Route::get('/portofolio', fn() => view('portofolio.portofolio'));
Route::get('/testimoni', fn() => view('testimoni.testimoni'));
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/admin', fn() => view('admin.admin'));

// Chatbot
Route::get('/chatbot', [GeminiController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [GeminiController::class, 'ask'])->name('gemini.ask');
Route::post('/chatbot/clear', [GeminiController::class, 'clear'])->name('chatbot.clear');