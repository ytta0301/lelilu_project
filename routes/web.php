<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/order', fn() => view('order.order'));
Route::get('/payment', fn() => view('payment.payment'));
Route::get('/portofolio', fn() => view('portofolio.portofolio'));
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/detail', fn() => view('detail.detail'))->name('detail');



Route::get('/admin/admin', fn() => view('admin.admin'))->name('admin.admin');
Route::get('/admin/worker', fn() => view('admin.worker'))->name('admin.worker');
Route::get('/admin/pesanan', fn() => view('admin.pesanan'))->name('admin.pesanan');
route::get('/admin/detail', fn() => view('admin.detail'))->name('admin.detail');
route::get('/admin/input', fn() => view('admin.input'))->name('admin.input');
route::get('/admin/edit', fn() => view('admin.edit'))->name('admin.edit');

// halaman user profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

// halaman testimoni
Route::get('/testimoni', fn() => view('testimoni.testimoni'));
Route::get('/testimoni', [TestimoniController::class, 'index']);

// Chatbot
Route::get('/chatbot', [GeminiController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [GeminiController::class, 'ask'])->name('gemini.ask');
Route::post('/chatbot/clear', [GeminiController::class, 'clear'])->name('chatbot.clear');

