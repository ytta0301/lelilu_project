<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminPortofolioController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPesananController;


// Guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman publik (tanpa login)
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/order', [PemesananController::class, 'create'])->name('order.create');
Route::post('/order', [PemesananController::class, 'store'])->name('order.store');
Route::get('/order/thanks', [PemesananController::class, 'thanks'])->name('order.thanks');
Route::get('/payment', fn() => view('payment.payment'));
Route::get('/portofolio', fn() => view('portofolio.portofolio'));
Route::get('/history', [HistoryController::class, 'index'])->name('history');

Route::get('/detail', fn() => view('detail.detail'))->name('detail');



///Route::get('/admin/worker', fn() => view('admin.worker'))->name('admin.worker');
Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user');
Route::post('/admin/user', [AdminUserController::class, 'store']);
Route::put('/admin/user/{id}', [AdminUserController::class, 'update']);
Route::delete('/admin/user/{id}', [AdminUserController::class, 'destroy']);
Route::get('/admin/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni');
Route::post('/admin/testimoni', [AdminTestimoniController::class, 'store']);
Route::put('/admin/testimoni/{id}', [AdminTestimoniController::class, 'update']);
Route::delete('/admin/testimoni/{id}', [AdminTestimoniController::class, 'destroy']);
Route::get('/admin/pesanan', [AdminPesananController::class, 'index'])->name('admin.pesanan');
route::get('/admin/input', fn() => view('admin.input'))->name('admin.input');
route::get('/admin/revisi', fn() => view('admin.revisi'))->name('admin.revisi');
route::get('/admin/produk', fn() => view('admin.produk'))->name('admin.produk');

Route::get('/admin/portofolio', [AdminPortofolioController::class, 'index'])->name('admin.portofolio');
Route::post('/admin/portofolio', [AdminPortofolioController::class, 'store']);
Route::put('/admin/portofolio/{id}', [AdminPortofolioController::class, 'update']);
Route::delete('/admin/portofolio/{id}', [AdminPortofolioController::class, 'destroy']);



// halaman user profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

// halaman testimoni
Route::get('/testimoni', fn() => view('testimoni.testimoni'));
Route::get('/testimoni', [TestimoniController::class, 'index']);
Route::get('/chatbot', [GeminiController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [GeminiController::class, 'ask'])->name('gemini.ask');
Route::post('/chatbot/clear', [GeminiController::class, 'clear'])->name('chatbot.clear');

// Halaman yang butuh login (auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/detail', fn() => view('detail.detail'))->name('detail');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
});

// Halaman admin (butuh login + role admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/user', [AdminUserController::class, 'index'])->name('admin.user');
    Route::post('/user', [AdminUserController::class, 'store']);
    Route::put('/user/{id}', [AdminUserController::class, 'update']);
    Route::delete('/user/{id}', [AdminUserController::class, 'destroy']);
    Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni');
    Route::post('/testimoni', [AdminTestimoniController::class, 'store']);
    Route::put('/testimoni/{id}', [AdminTestimoniController::class, 'update']);
    Route::delete('/testimoni/{id}', [AdminTestimoniController::class, 'destroy']);
    Route::get('/pesanan', fn() => view('admin.pesanan'))->name('admin.pesanan');
    Route::get('/input', fn() => view('admin.input'))->name('admin.input');
    Route::get('/revisi', fn() => view('admin.revisi'))->name('admin.revisi');
});