<?php

use App\Models\Product;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\AuthController; 

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/chatbot', [GeminiController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [GeminiController::class, 'ask'])->name('gemini.ask');
Route::post('/chatbot/clear', [GeminiController::class, 'clear'])->name('chatbot.clear');


Route::get('/', function () {
    return view('welcome'); // Folder.NamaFile
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard'); // Folder.NamaFile
});

Route::get('/order', function () {
    return view('order.order'); // Folder.NamaFile
});

Route::get('/payment', function () {
    return view('payment.payment'); // Folder.NamaFile
});

Route::get('/admin', function () {
    return view('admin.admin'); // Folder.NamaFile
});

Route::get('/history', function () {
    return view('history.history'); // Folder.NamaFile
});

Route::get('/portofolio', function () {
    return view('portofolio.portofolio'); // Folder.NamaFile
});

Route::get('/testimoni', function () {
    return view('testimoni.testimoni'); // Folder.NamaFile
});

